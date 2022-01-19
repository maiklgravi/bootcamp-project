<?php
namespace App\Http\Middleware;
use App\Services\UserRepresenationTrait;
use App\Services\DummyRequestActivityLogger;
use Closure;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;


class LogActivityMiddleware

{
    use UserRepresenationTrait;
    private DummyRequestActivityLogger $logger;
    /**
     * @param DummyRequestActivityLogger $logger
     */
    public function __construct(DummyRequestActivityLogger $logger)
    {
        $this->logger = $logger;
    }
    /**
     * @param Request $request
     * @param Closure $next
     * @param string|null $type
     */
    public function handle($request, Closure $next, ?string $type = null)
    {
        $this->logger->logRequest($request, $type ?? 'unknown page');

        return $next($request);
    }
}