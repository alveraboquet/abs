<?php

namespace App\Http\Controllers;

use App\Mail\Feedback;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    //
    public function create(Request $request)
    {
        $request->validate([
            'phone' => ['required'],
            'email' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
        ]);

        Support::create([
            'user_id' => Auth::id(),
            'phone' => $request->phone,
            'email' => $request->email,
            'title' => $request->title,
            'content' => $request->content,
        ]);
        Mail::to('customer.service@absglobalco.com')->send(new Feedback($request->email, $request->phone, $request->title, $request->content));

        return back()->banner('Successfully submitted');
    }
}
