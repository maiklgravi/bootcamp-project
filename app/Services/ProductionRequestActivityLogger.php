<?php
namespace App\Services;

use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

class ProductionRequestActivityLogger extends AbstractRequestActivityLogger
{
    protected function collectRequestData(Request $request): array
    {
        $id =  $request->id;
        $name = $request->name;
        $status = $request->satatus;
        return [
        'id'=> $id,
        'name'=>$name,
        'status'=>$status,
        ];
    }
}