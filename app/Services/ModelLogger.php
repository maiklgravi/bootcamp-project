<?php
namespace App\Services;
use App\Models\LoggableInterface;
use App\Models\User;
use Psr\Log\LoggerInterface;


class ModelLogger
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function logModel(?User $user, LoggableInterface $loggable):void{
        $userReprezentation = $user ? "User with id {$user->id}" : "Unknown User";
        $this->logger->info(
        $userReprezentation . " accesed " . $loggable->convertToLoggableString(), 
        $loggable->getData(),);
    }
}