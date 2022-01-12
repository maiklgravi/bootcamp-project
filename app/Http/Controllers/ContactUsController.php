<?php

namespace App\Http\Controllers;


use App\Http\Requests\ContactUsRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class ContactUsController extends Controller
{
    public function view(): View
    {
        return view('contacts.contactUs');
    }

    public function send(ContactUsRequest $request): RedirectResponse
    {
        \Log::debug('test', $request->validate());

        
        return redirect()->route('contactUs');
    }
}
