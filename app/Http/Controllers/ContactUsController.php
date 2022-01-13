<?php

namespace App\Http\Controllers;


use App\Http\Requests\ContactUsRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Mail\Message;
use App\Services\ContactUsMailer;


class ContactUsController extends Controller
{
    public function view(): View
    {
        return view('contacts.contactUs');
    }

    public function send(ContactUsRequest $request,ContactUsMailer $mailer): RedirectResponse
    {
       
        $data = $request->validated();
        \Log::debug('test', $data);
        $mailer->send($data);

        return redirect()->route('contactUs')->withInput($data);
    }
}