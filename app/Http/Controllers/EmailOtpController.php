<?php

namespace App\Http\Controllers;

use App\Mail\VerificationEmail;
use App\Models\EmailOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmailOtpController extends Controller
{
    //
    public function create(Request $request)
    {

        $request->validate(['email' => ['required', 'string', 'email', 'max:255', 'unique:users']]);

        $code = rand(100000, 999999);
        $rec = EmailOtp::firstOrCreate(['email' => $request->email,], [
            'code' => $code,
            'created_at' => now()
        ]);

        $limit = 10;
        if (!$rec->wasRecentlyCreated) {
            $diff = now()->diffInMinutes($rec->created_at);
            if ($diff > $limit) {
                EmailOtp::where('email', $request->email)->delete();
                EmailOtp::firstOrCreate(['email' => $request->email,], [
                    'code' => $code,
                    'created_at' => now()
                ]);

                back()->banner('Resent email');
            } else {
                return back()->dangerBanner('Cannot resent email within ' . $limit . ' minutes');
            }
        }



        Mail::to($request->email)->send(new VerificationEmail($code));

        return back()->banner('Email Sent');
    }
}
