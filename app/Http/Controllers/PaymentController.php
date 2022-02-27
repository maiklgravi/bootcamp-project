<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index(){
        if(Auth::check()){

            return view('payment.payment_form');
        }else{
            return route('user.login');
        }


    }

    public function payment(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $validatedData = $request->validate([
                'name' => ['required','max:20','min:5'],
                'cardNumber' => ['required','min:12','max:12'],
                'mouthSubscribe' => ['required','numeric'],
                'expiry' => ['required'],
                'crv' => ['required','min:3','max:3'],
            ]);
            $mounth = $request->mouthSubscribe;
            DB::table('payment')->insertOrIgnore([
                ['id_user'=>$user->id,
                'month'=>$request->mouthSubscribe,
                'date_payment'=>Carbon::now(),
                'value'=>5 ]]);
        }else{

        }
        }
}
