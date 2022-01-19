<?php
namespace App\Services;
trait UserRepresenationTrait
{
    protected function identifyUserReresentation(?User $user):string {
        return $user ? "User with id {$user->id}" : "Unknown User";
    }
}