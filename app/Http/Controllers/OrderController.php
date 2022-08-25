<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


        Order::create([
            'user_id' => $user->id,
            'amount' => $amount
        ]);

        $user->personal_sales += $amount;
        $user->usdt_wallet -= $amount;
        $user->save();
        return back()->banner('Successfully created');
    }
}
