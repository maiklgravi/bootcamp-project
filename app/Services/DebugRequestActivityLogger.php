<?php
namespace App\Services;

use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

class DebugRequestActivityLogger extends AbstractRequestActivityLogger
{
    protected function collectRequestData(Request $request): array
    {
        $allData = Request::all();
        return [
        'allData'=> $allData,];
      
        
    }
}