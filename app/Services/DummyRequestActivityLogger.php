<?php
namespace App\Services;

use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

class DummyRequestActivityLogger extends AbstractRequestActivityLogger
{
    protected function collectRequestData(Request $request): array
    {
        return ['dummy data'];
    }
}