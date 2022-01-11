<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function view(): View
    {
        return view('contacts.contactUs');
    }
}
