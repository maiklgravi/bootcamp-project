<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $films = Film::select([
            'id',
            'image',
            'description',
            'date',
            'name',
            'public_availability',])
            ->orderBy('like','DESC')->limit(4)->get();

    }

}
