<?php
namespace App\Services;
use Illuminate\Http\REquest;
abstract class AbstractRequestActivityLogger implements RequestActivityLogger
{
    use UserRepresenationTrait;
    private LoggerInterface $logger;
    public function logRequest(Request $request, string $type): void
    {
        $this->logger->debug(
            $this->identifyUserRepresentation($request->user()) . ' made a request to ' . $type,
            $this->collectRequestData($request)
        );
    }
    abstract protected function collectRequestData(Request $request): array;
}