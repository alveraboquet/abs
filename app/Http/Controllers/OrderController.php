<?php

namespace App\Http\Controllers;

use App\Models\BonusHistory;
use App\Models\Order;
use App\Models\User;
use App\Models\WalletLog;
use App\Services\RunningNumberService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class OrderController extends Controller
{
    //
    public function create(Request $request)
    {
        $request->validate([
            'amount' => ['required', 'numeric', 'min:1000'],
            'agree_1' => ['required', 'accepted'],
            'agree_2' => ['required', 'accepted'],
            'agree_3' => ['required', 'accepted']
        ]);
        $amount = floatval($request->amount);
        $user = User::find(Auth::id());
        if ($user->usdt_wallet < $amount) {
            return back()->dangerBanner('Insufficient balance');
        }

        $order_id = RunningNumberService::getID('order');
        Order::create([
            'order_id' => $order_id,
            'user_id' => $user->id,
            'amount' => $amount,
            'float_amount' => $amount,
            'date_apply' => today(),
        ]);

        WalletLog::create([
            'user_id' => $user->id,
            'wallet_type' => 'usdt',
            'type' => 'stacking',
            'opening_balance' => $user->usdt_wallet,
            'amount' => -1 * $amount,
            'closing_balance' => $user->usdt_wallet - $amount
        ]);


        $upline = $user->parent;
        $direct = true;

        while ($upline) {
            if ($direct) {
                $upline->direct_sales += $amount;
                $direct = false;
            }
            $upline->group_sales += $amount;
            $upline->save();
            $upline = $upline->parent;
        }

        $user->personal_sales += $amount;
        $user->usdt_wallet -= $amount;


        $user->save();


        return back()->banner('Successfully created');
    }

    public function getOrder(Request $request, $id)
    {
        $lists = BonusHistory::where('order_id', $id)->where('user_id', Auth::id())->latest()->get();
        return Inertia::render('StakingStatement', compact('lists'));
    }
}
