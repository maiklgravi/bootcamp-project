<?php
namespace App\Services;

use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

class ProductionRequestActivityLogger extends AbstractRequestActivityLogger
{
    protected function collectRequestData(Request $request): array
    {
        $id =  Request::only('id');
        $name = Request::only('name');
        $status = Request::only('status');
        return [
        'id'=> $id,
        'name'=>$name,
        'status'=>$status,
        ];
    }
}