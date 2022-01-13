<?php
namespace App\Services;

use Illuminate\Mail\Message;
use Illuminate\Mail\Mailer;
use Psr\Log\LoggerInterface;

class ContactUsMailer
{
    private Mailer $infrastructureMailer;
    private LoggerInterface $logger;
    public function __construct(Mailer $infrastructureMailer,LoggerInterface $logger){
        $this->infrastructureMailer = $infrastructureMailer;
        $this->logger = $logger;
    }
    public function send(array $data): void{
        $this->infrastructureMailer->send(
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
        $this->logger->info('Contact Us mail send to tech@group.app');
    }
}