<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect('user.private');
        }
        return view('login');
    }
    public function login(Request $request){
        if (Auth::check()){
            return redirect()->intended(route('user.private'));
        }
        $formFild = $request->only(['email','password']);
        if (Auth::attempt($formFild)){
            return redirect()->intended(route('user.private'));
        }
        return redirect(route('user.login'))->withErrors([
            'formError' => 'Error with login user'
        ]);
    }
    public function loginout(){
        Auth::logout();
        return redirect(route('home'));
    }
}
