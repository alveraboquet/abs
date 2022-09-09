<?php

namespace App\Http\Controllers;

use App\Models\BonusHistory;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Profit;
use App\Models\Ranking;
use App\Models\Support;
use App\Models\User;
use App\Models\WalletLog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    //
    public function home()
    {
        $yesterday = Carbon::yesterday()->format("Y-m-d");

        $yesterdayProfit = Profit::where('date', "<=", $yesterday)->latest('date')->first();
        // dd($yesterdayProfit);
        $lastWeekProfit = Profit::whereBetween('date', [Carbon::yesterday()->subDay(6), $yesterday])->get();
        $chartProfit = $lastWeekProfit->pluck('profit_1');
        $chartDate = $lastWeekProfit->pluck('date');
        //dd(Carbon::yesterday()->subDay(7)->format('Y-m-d'));
        $monthlyProfit = Profit::whereBetween('date', [Carbon::now()->startOfMonth(), $yesterday])->pluck('profit_1')->sum();
        $accumulateProfit = Profit::whereBetween('date', [Carbon::now()->startOfYear(), $yesterday])->pluck('profit_1')->sum();

        //fake data
        $accumulateProfit += 30.5416;

        $data = [];
        return Inertia::render('Home', [
            'yesterdayProfit' => $yesterdayProfit,
            'lastWeekProfit' => [
                'date' => $chartDate,
                'profit' => $chartProfit
            ],
            'monthlyProfit' => $monthlyProfit,
            'accumulateProfit' => $accumulateProfit,
        ]);
    }

    public function getDownline(Request $request)
    {
        $id = $request->id ?? null;
        $search = $request->search;
        if (Auth::user()->role == "admin") {
            if ($search) {
                $rootUsers = User::query()
                    ->where('username', 'like', "%{$search}%")
                    ->with(['children'])->get();
            } else {
                $rootUsers = User::query()->where('referral', NULL)
                    ->with(['children'])->get();
            }
        } else {
            if ($search) {
                $rootUsers = User::query()->where(function ($q) use ($search) {
                    $q->where('hierarchyList', 'like', '%-' . Auth::id() . '-%')->orWhere('id', Auth::id());
                })
                    ->where('username', 'like', "%{$search}%")
                    ->with(['children'])->get();
            } else {
                $rootUsers = User::query()->where('id', Auth::id())
                    ->with(['children'])->get();
            }
        }
        $directUsers = User::where('referral', Auth::id())->get();

        return Inertia::render('MyTeam', [
            'users' => $rootUsers,
            'directUsers' => $directUsers,
            'filters' => $request->only(['search']),
        ]);
    }
    public function manageMember()
    {
        $users = User::where('role', 'user')->get();
        $rankings = Ranking::all();
        return Inertia::render('ManageMember', [
            'users' => $users,
            'ranking' => $rankings,
        ]);
    }

    public function manageTopup()
    {
        $lists = Payment::where('trx_type', 'topup')->with(['user'])->latest()->get();
        return Inertia::render('ManageTopup', [
            'lists' => $lists,
        ]);
    }

    public function manageWithdraw()
    {
        $lists = Payment::where('trx_type', 'withdraw')->with(['user'])->get();
        return Inertia::render('ManageWithdraw', [
            'lists' => $lists,
        ]);
    }



    public function delete(Request $request)
    {
        dd(User::find($request->id));
    }


    public function submitKyc(Request $request)
    {

        $request->validate([
            'id_type' => ['required'],
            'full_name' => ['required', 'string', 'max:255'],
            'id_no' => ['required'],
            'usdt_address' => ['required'],
            'hold_img' => ['required', 'file'],
            'utils_img' => ['required', 'file'],
        ]);
        $user = User::find(Auth::id());
        $kyc_path = "uploads/" . $user->id;
        if ($request->id_type == 'ic') {
            $request->validate([
                'front_img' => ['required', 'file'],
                'back_img' => ['required', 'file'],
            ]);

            $front_img = $request->file('front_img');
            $front_img_name = pathinfo($front_img->getClientOriginalName(), PATHINFO_FILENAME) . time() . '.' . $front_img->getClientOriginalExtension();
            $front_img->move($kyc_path, $front_img_name);

            $back_img = $request->file('back_img');
            $back_img_name = pathinfo($back_img->getClientOriginalName(), PATHINFO_FILENAME) . time() . '.' . $back_img->getClientOriginalExtension();
            $back_img->move($kyc_path, $back_img_name);

            $user->front_img = $front_img_name;
            $user->back_img = $back_img_name;
        } else {
            $request->validate([
                'passport_img' => ['required', 'file'],
            ]);

            $passport_img = $request->file('passport_img');
            $passport_img_name = pathinfo($passport_img->getClientOriginalName(), PATHINFO_FILENAME) . time() . '.' . $passport_img->getClientOriginalExtension();
            $passport_img->move($kyc_path, $passport_img_name);
            $user->passport_img = $passport_img_name;
        }

        $hold_img = $request->file('hold_img');
        $hold_img_name = pathinfo($hold_img->getClientOriginalName(), PATHINFO_FILENAME) . time() . '.' . $hold_img->getClientOriginalExtension();
        $hold_img->move($kyc_path, $hold_img_name);


        $utils_img = $request->file('utils_img');
        $utils_img_name = pathinfo($utils_img->getClientOriginalName(), PATHINFO_FILENAME) . time() . '.' . $utils_img->getClientOriginalExtension();
        $utils_img->move($kyc_path, $utils_img_name);

        $user->hold_img = $hold_img_name;
        $user->utils_img = $utils_img_name;

        $user->full_name = $request->full_name;
        $user->id_no = $request->id_no;
        $user->usdt_address = $request->usdt_address;
        $user->id_type = $request->id_type;
        $user->kyc_status = 'Pending';
        $user->kyc_reason = null;
        $user->save();

        return back()->banner('Wait for Approval');
    }

    public function topupHistory()
    {
        $lists = Payment::where('user_id', Auth::id())->where('trx_type', 'topup')->latest()->get();

        return Inertia::render('TopupHistory', compact('lists'));
    }

    public function withdrawalHistory()
    {
        $lists = Payment::where('user_id', Auth::id())->where('trx_type', 'withdraw')->latest()->get();

        return Inertia::render('WithdrawalHistory', compact('lists'));
    }

    public function updateTopup(Request $request)
    {
        $payment = Payment::find($request->id);
        $payment->update(['status' => $request->status]);
        if ($request->status == 'Approved') {
            $user = User::find($payment->user_id);

            WalletLog::create([
                'user_id' => $user->id,
                'wallet_type' => 'usdt',
                'type' => 'topup',
                'opening_balance' => $user->usdt_wallet,
                'amount' => $payment->actual_amount,
                'closing_balance' => $user->usdt_wallet + $payment->actual_amount
            ]);
            $user->usdt_wallet += $payment->actual_amount;
            $user->save();
        }
        return back()->banner('Update successfull');
    }

    public function updateWithdraw(Request $request)
    {
        $payment = Payment::find($request->id);
        $payment->update(['status' => $request->status]);
        if ($request->status == 'Approved') {
            $user = User::find($payment->user_id);

            WalletLog::create([
                'user_id' => $user->id,
                'wallet_type' => 'roi',
                'type' => 'withdraw',
                'opening_balance' => $user->roi_wallet,
                'amount' => $payment->actual_amount,
                'closing_balance' => $user->roi_wallet - $payment->actual_amount
            ]);
            $user->roi_wallet -= $payment->actual_amount;
            $user->save();
        }
        return back()->banner('Update successfull');
    }

    public function internalRegister(Request $request)
    {
        $input['invite_code'] = strtoupper($request->invite_code);
        $input = $request->validate([
            'country' => ['required', 'numeric'],
            'province' => ['nullable', 'numeric'],
            'full_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'alpha_dash', 'max:255', 'unique:users'],
            'invite_code' => ['required', 'string', 'min:6', 'exists:users,invite_code'],
            'password' => [Password::min(8)],
            'security_pin' => ['required', 'string', 'min:6'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phonePrefix' => ['required'],
        ]);


        do {
            $code = strtoupper(Str::random(6));
            $exists = User::where('invite_code', $code)->exists();
        } while ($exists);

        $referrer = User::firstWhere('invite_code', $input['invite_code']);
        $referrer->total_direct += 1;
        $upline = $referrer;
        while ($upline) {
            $upline->total_group += 1;
            $upline->save();
            $upline = $upline->parent;
        }
        $hierarchyList = $referrer->hierarchyList ? $referrer->hierarchyList . $referrer->id . '-' : '-' . $referrer->id . '-';

        User::create([
            'username' => $input['username'],
            'full_name' => $input['full_name'],
            'email' => $input['email'],
            'phone' => $input['phonePrefix'] . $input['phone'],
            'password' => Hash::make($input['password']),
            'security_pin' => Hash::make($input['security_pin']),
            'country' => $input['country'],
            'province' => $input['province'],
            'referral' => $referrer->id,
            'hierarchyList' => $hierarchyList,
            'invite_code' => $code,
        ]);

        return back()->banner('Register success. Invite code is ' . $code);
    }

    public function getStaking(Request $request)
    {
        $lists = Order::where('user_id', Auth::id())->latest()->get();
        $total_profit = $lists->sum('total_profit');
        $daily_profit = BonusHistory::where('user_id', Auth::id())->where('date_entitle', today())->sum('net_bonus');
        return Inertia::render('Staking', compact('lists', 'total_profit', 'daily_profit'));
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', Password::defaults(), 'confirmed', 'different:current_password'],
        ]);

        $user = Auth::user();

        $user->update(['password' => Hash::make($request->new_password)]);
        return back()->banner('Update Successful');
    }

    public function updateUser(Request $request)
    {

        $request->validate(['ranking' => 'required']);
        $user = User::find($request->id);
        $user->update(['ranking' => $request->ranking]);

        return back()->banner('Update Successful');
    }

    public function updateKYC(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'status' => 'required'
        ]);

        $user = User::find($request->id);
        if ($request->status == 'Rejected') {

            if ($user->id_type == 'ic') {
                File::delete(public_path($user->front_img));
                File::delete(public_path($user->back_img));
                $user->front_img = null;
                $user->back_img = null;
            } else {
                File::delete(public_path($user->passport_img));
                $user->passport_img = null;
            }
            File::delete(public_path($user->hold_img));
            File::delete(public_path($user->utils_img));
            $user->hold_img = null;
            $user->utils_img = null;
        }
        $user->kyc_status = $request->status;
        $user->save();

        return back()->banner('Update Successful');
    }

    public function manageOrder(Request $request)
    {
        $lists = Order::latest()->with(['user'])->get();
        return Inertia::render('ManageOrder', compact('lists'));
    }

    public function updateOrder(Request $request)
    {
        $order = Order::find($request->id);
        $order->update(['status' => $request->status]);

        return back()->banner('Update successfull');
    }
    public function createAdmin(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'alpha_dash', 'max:255', 'unique:users'],
            'password' => ['required', Password::min(8)],
            'security_pin' => ['required', 'string', 'min:6'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'security_pin' => Hash::make($request->security_pin),
            'role' => 'admin',
        ]);

        return back()->banner('Create Admin Successful');
    }

    public function getUSDTAsset(Request $request)
    {
        $type = $request->type ?? 'all';
        if ($type == "all") {
            $lists = WalletLog::where('user_id', Auth::id())->where('wallet_type', 'usdt')->latest()->get();
        } else {
            $lists = WalletLog::where('user_id', Auth::id())->where('wallet_type', 'usdt')->where('type', $type)->latest()->get();
        }
        return Inertia::render('USDTAsset', [
            'lists' => $lists,
            'filters' => $request->only(['type'])
        ]);
    }

    public function getROIAsset(Request $request)
    {
        $type = $request->type ?? 'all';
        if ($type == "all") {
            $lists = WalletLog::where('user_id', Auth::id())->where('wallet_type', 'roi')->latest()->get();
        } else {
            /*  switch ($type) {
                case 'roi_bonus': {
                        $type = 'Personal';
                        break;
                    }
                case 'team_sharing': {
                        $type = 'Team Sharing';
                        break;
                    }
                case 'profit_sharing': {
                        $type = 'Profit Sharing';
                        break;
                    }
            } */
            $lists = WalletLog::where('user_id', Auth::id())->where('wallet_type', 'roi')->where('type', $type)->latest()->get();
        }
        /*  $lists = BonusHistory::where('user_id', Auth::id());
        if ($type == "all") {
        } else {
            switch ($type) {
                case 'roi_bonus': {
                        $type = 'Personal';
                        break;
                    }
                case 'team_sharing': {
                        $type = 'Team Sharing';
                        break;
                    }
                case 'profit_sharing': {
                        $type = 'Profit Sharing';
                        break;
                    }
            }
            $lists = $lists->where('bonus_type', $type);
        } */
        $lists = $lists->latest()->get();
        return Inertia::render('ROIAsset', [
            'lists' => $lists,
            'filters' => $request->only(['type'])
        ]);
    }
    public function manageProfit(Request $request)
    {
        $lists = Profit::latest('date')->get();
        return Inertia::render('ManageProfit', [
            'lists' => $lists,
        ]);
    }
    public function updateProfit(Request $request)
    {
        $date = Carbon::parse($request->date);

        if ($request->profit_1 <= 0) {
            return back()->dangerBanner('Amount cannot be 0');
        }
        $r = Profit::firstWhere('date', $date);
        if ($r) {
            return back()->dangerBanner('Already exists');
        } else {

            Profit::create([
                'date' => $date,
                'year' => $date->year,
                'month' => $date->month,
                'day' => $date->day,
                'total_profit' => $request->profit_1 * 3,
                'profit_1' => $request->profit_1,
                'profit_2' => $request->profit_1,
                'profit_3' => $request->profit_1,

            ]);
            return back()->banner('Success');
        }
    }

    public function dashboard(Request $request)
    {
        $pending_kyc = User::where('kyc_status', 'pending')->count();
        $pending_topup = Payment::where('status', 'Pending')->where('trx_type', 'topup')->count();
        return  Inertia::render('Dashboard', ['pending_kyc' => $pending_kyc, 'pending_topup' => $pending_topup]);
    }
}
