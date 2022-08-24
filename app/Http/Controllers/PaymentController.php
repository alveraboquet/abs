<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\RunningNumber;
use App\Services\RunningNumberService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    private $path_url = 'uploads/transaction';
    //

    public function deposit(Request $request)
    {
        $request->validate([
            'amount' => ['required', 'numeric', 'min:0'],
            'TxID' => ['required'],
            'receipt' => ['required', 'image'],
        ]);

        $receipt = $request->file('receipt');
        $receipt_name = pathinfo($receipt->getClientOriginalName(), PATHINFO_FILENAME) . time() . '.' . $receipt->getClientOriginalExtension();
        $receipt->move($this->path_url, $receipt_name);

        $payment_id = RunningNumberService::getID('transaction');
        Payment::create([
            'trx_type' => 'deposit',
            'payment_id' => $payment_id,
            'original_amount' => $request->amount,
            'actual_amount' => $request->amount,
            'TxID' => $request->TxID,
            'receipt' => $receipt_name,
            'user_id' => Auth::id(),
        ]);
        return back()->with('success_message', 'Success');
    }
}
