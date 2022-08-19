<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    //

    public function getDownline(Request $request)
    {
        $id = $request->id ?? null;

        $rootUsers = User::where('referral', $id)->with(['children'])->get();



        return Inertia::render('MyTeam', [
            'users' => $rootUsers,
        ]);
    }
}
