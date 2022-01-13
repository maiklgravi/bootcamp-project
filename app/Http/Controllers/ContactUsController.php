<?php

namespace App\Http\Controllers;


use App\Http\Requests\ContactUsRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Mail\Message;


class ContactUsController extends Controller
{
    public function view(): View
    {
        return view('contacts.contactUs');
    }

    public function send(ContactUsRequest $request): RedirectResponse
    {
        $data = $request->validated();
        \Log::debug('test', $data);
        \Mail::send(
            'emails.contactUs',
            [
                'email'=>$data['email'],
                'name'=>$data['name'],
                'subjectMessage'=>$data['subject'],
                'messageText'=>$data['message']
            ],
            function (Message $message) use($data){
                $message->subject('Message from ' . $data['email']);
                $message->to('tech@group.app');
                $message->from('no_reply@group.app', 'Cinema Helper');
        } );

        return redirect()->route('contactUs')->withInput($data);
    }
}
