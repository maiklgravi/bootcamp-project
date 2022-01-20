<?php
namespace App\Services;

use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

class DebugRequestActivityLogger extends AbstractRequestActivityLogger
{
    protected function collectRequestData(Request $request): array
    {
        $uri = $request->path();
        $method = $request->method();
        $ipAddress = $request->ip();
        return [
        'uri'=> $request->path(),
        'method'=> $request->method(),
        'ipAddress'=> $request->ip(),
        ];
    }
}