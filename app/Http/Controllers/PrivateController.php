<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PrivateController extends Controller
{
    public function showWelcomePage()
    {
        $user = Auth::user();
        $statusSubscribe = false;
        $payments = Payment::select()->where('id_user' ,'=' , $user->id)->get();
        foreach ($payments as $payment) {
        if ($payment->date_payment < Carbon::now()->addMonth($payment->month) ){
        $statusSubscribe = true;           }
                }

        return view('private',['user'=>$user,

        'statusSubscribe'=>$statusSubscribe]);

    }
}
