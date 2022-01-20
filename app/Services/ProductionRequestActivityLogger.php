<?php
namespace App\Services;

use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

class ProductionRequestActivityLogger extends AbstractRequestActivityLogger
{
    protected function collectRequestData(Request $request): array
    {
        $ipAddress = $request->ip();
        $input = $request->all();
        return [
        'ipAddress'=>$ipAddress,
        'input'=>$input,
        ];
    }
}