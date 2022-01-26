<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect('user.private');
        }
        return view('registration');
    }
    public function save(Request $request){
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        $validateFilds = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required',
            'name'=>'required',
        ]);
        if (User::where(
            'email', $validateFilds['email']
            )->exists()){
                redirect(route('user.registration'))->withErrors([
                    'email' => 'This user alredi exist'
                ]);
            }

        $user=User::create($validateFilds);
        if($user){
            Auth::login($user);
            return redirect(route('user.private'));
        }
        return redirect(route('user.login'))->withErrors([
            'formError' => 'Error with registration user'
        ]);
    }
}
