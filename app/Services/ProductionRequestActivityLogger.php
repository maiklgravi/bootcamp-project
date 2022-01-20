<?php
namespace App\Services;

use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

class ProductionRequestActivityLogger extends AbstractRequestActivityLogger
{
    protected function collectRequestData(Request $request): array
    {
        return [
            $request->query('id'),
            $request->query('name'),
            $request->query('image'),
            $request->query('status'),
        ];
    }
}