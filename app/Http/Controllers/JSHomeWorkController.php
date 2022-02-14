<?php
namespace App\Http\Controllers;


class JSHomeWorkController extends Controller
{
    public function index(){
        return view('jshome');
    }
    public function cart(){
        return view('jshome2');
    }
}
