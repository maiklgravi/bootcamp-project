<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PrivateController extends Controller
{
    public function showWelcomePage()
    {
        $user = Auth::user();
        return view('private',['user'=>$user]);

    }
}
