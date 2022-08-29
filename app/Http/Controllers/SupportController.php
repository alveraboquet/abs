<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return back()->banner('Successfully submitted');
    }
}
