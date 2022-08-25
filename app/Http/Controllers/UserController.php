<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Profit;
use App\Models\Ranking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    //
    public function home()
    {
        $yesterday = Carbon::yesterday()->format("Y-m-d");

        $yesterdayProfit = Profit::firstWhere('date', $yesterday);
        // dd($yesterdayProfit);
        $lastWeekProfit = Profit::whereBetween('date', [Carbon::yesterday()->subDay(6), $yesterday])->get();
        $chartProfit = $lastWeekProfit->pluck('profit_1');
        $chartDate = $lastWeekProfit->pluck('date');
        //dd(Carbon::yesterday()->subDay(7)->format('Y-m-d'));
        $monthlyProfit = Profit::whereBetween('date', [Carbon::now()->startOfMonth(), $yesterday])->pluck('profit_1')->sum();
        $accumulateProfit = Profit::whereBetween('date', [Carbon::now()->startOfYear(), $yesterday])->pluck('profit_1')->sum();

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

        $directUsers = User::where('referral', Auth::id())->get();

        return Inertia::render('MyTeam', [
            'users' => $rootUsers,
            'directUsers' => $directUsers,
            'filters' => $request->only(['search']),
        ]);
    }
    public function manageMember()
    {
        $users = User::all();
        $rankings = Ranking::all();
        return Inertia::render('ManageMember', [
            'users' => $users,
            'ranking' => $rankings,
        ]);
    }

    public function manageTopup()
    {
        $lists = Payment::where('trx_type', 'deposit')->with(['user'])->get();
        return Inertia::render('ManageTopup', [
            'lists' => $lists,
        ]);
    }


    public function delete(Request $request)
    {
        dd(User::find($request->id));
    }

    public function calculateProfit()
    {
        $now = now();
        $days = $now->daysInMonth;
        $maxProfit = 12;
        $percentagePerDay = array();
        $profitPerDay = array();
        for ($i = 0; $i < $days; $i++) {
            //  $rand = $this->float_rand(0, 1, 4);
            $rand = rand(1, 100);
            $percentagePerDay[$i] = $rand;
        }
        $sumPercentage = collect($percentagePerDay)->sum();
        for ($i = 0; $i < $days; $i++) {
            $profit = $percentagePerDay[$i] / $sumPercentage * $maxProfit;
            $profitPerDay[$i] = round($profit, 4);
        }
        $sumProfit = round(collect($profitPerDay)->sum(), 4);
        $overflow = $maxProfit - round($sumProfit, 4);
        $profitPerDay[rand(0, $days - 1)] += $overflow;



        //split to 3
        $randPerDay = array();
        for ($i = 0; $i < $days; $i++) {
            $randArr = array();
            for ($j = 0; $j < 3; $j++) {
                $rand = rand(1, 100);
                $randArr[$j] = $rand;
            }
            $randPerDay[$i] = $randArr;
        }
        $sumRandPerDay = array();
        $sumRandPerDay =  collect($randPerDay)->map(function ($item) {
            return collect($item)->sum();
        })->toArray();



        $realProfit = array();
        for ($i = 0; $i < $days; $i++) {
            $eachProfit = array();
            for ($j = 0; $j < 3; $j++) {

                $profit = $randPerDay[$i][$j] / $sumRandPerDay[$i] * $profitPerDay[$i];
                $eachProfit[$j] = round($profit, 4);
            }

            $sumEachProfit = round(collect($eachProfit)->sum(), 4);
            $overflow = $profitPerDay[$i] - round($sumEachProfit, 4);

            $eachProfit[rand(0, 2)] += $overflow;

            $realProfit[$i] = $eachProfit;
        }

        $date = Carbon::parse("2022-08-01")->startOfMonth();
        for ($i = 0; $i < $days; $i++) {

            Profit::create([
                'date' => $date,
                'year' => $date->year,
                'month' => $date->month,
                'day' => $date->day,
                'total_profit' => $profitPerDay[$i],
                'profit_1' => $realProfit[$i][0],
                'profit_2' => $realProfit[$i][1],
                'profit_3' => $realProfit[$i][2],
            ]);
            $date->addDay(1);
        }
        return true;
    }

    /**
     * Generate Float Random Number
     *
     * @param float $Min Minimal value
     * @param float $Max Maximal value
     * @param int $round The optional number of decimal digits to round to. default 0 means not round
     * @return float Random float value
     */
    function float_rand($Min, $Max, $round = 0)
    {
        //validate input
        if ($Min > $Max) {
            $min = $Max;
            $max = $Min;
        } else {
            $min = $Min;
            $max = $Max;
        }
        $randomfloat = $min + mt_rand() / mt_getrandmax() * ($max - $min);
        if ($round > 0)
            $randomfloat = round($randomfloat, $round);

        return $randomfloat;
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
        $user->kyc_status = 'Pending';
        $user->kyc_reason = null;
        $user->save();

        return back()->banner('Wait for Approval');
    }

    public function topupHistory()
    {
        $lists = Payment::where('user_id', Auth::id())->where('trx_type', 'deposit')->latest()->get();

        return Inertia::render('TopupHistory', compact('lists'));
    }

    public function withdrawalHistory()
    {
        //$lists = Payment::where('user_id', Auth::id())->latest()->get();
    }
}
