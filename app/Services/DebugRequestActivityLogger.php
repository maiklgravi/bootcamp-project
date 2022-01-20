<?php
namespace App\Services;

use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

class DebugRequestActivityLogger extends AbstractRequestActivityLogger
{
    protected function collectRequestData(Request $request): array
    {
        return (
            "Has oppen film with id" . $request->id 
            . "were name is" . $request->name 
            . "were status is" . $request->status 
            . "and name for image is" . $request->image 
            );
    }
}