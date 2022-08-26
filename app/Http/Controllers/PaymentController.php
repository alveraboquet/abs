<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\RunningNumber;
use App\Models\WalletLog;
use App\Services\RunningNumberService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    private $path_url = 'uploads/transaction';
    //

    public function topup(Request $request)
    {
        $request->validate([
            'amount' => ['required', 'numeric', 'min:0'],
            'TxID' => ['required'],
            'receipt' => ['required', 'image'],
        ]);

        $receipt = $request->file('receipt');
        $receipt_name = pathinfo($receipt->getClientOriginalName(), PATHINFO_FILENAME) . time() . '.' . $receipt->getClientOriginalExtension();
        $receipt->move($this->path_url, $receipt_name);
        $processing_fee = 0;
        $actualAmount = $request->amount - $processing_fee;
        $payment_id = RunningNumberService::getID('transaction');
        Payment::create([
            'trx_type' => 'topup',
            'payment_id' => $payment_id,
            'original_amount' => $request->amount,
            'actual_amount' => $actualAmount,
            'TxID' => $request->TxID,
            'receipt' => $receipt_name,
            'user_id' => Auth::id(),
        ]);

        return back()->with('success_message', 'Success');
    }
}
