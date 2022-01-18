<?php
namespace App\Http\Middleware;
use App\Services\UserRepresenationTrait;
use Closure;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;


class LogActivityMiddleware

{
    use UserRepresenationTrait;
    private LoggerInterface $logger;
    /**
     * @param LogggerInterface $logger
     */
    public function __construct(LoggerInterface $logger){
        $this->logger=$logger;
    }
    /**
     * @param Request $request
     * @param Closure $next
     * @param string|null $type
     */
    public function handle($request, Closure $next, ?string $type = null)
    {
        /** @var User $user */
        
        

        $this->logger->debug(
            $this->identifyUserReresentation($request->user()). ' made a request to ' . ($type ?? 'unknown page'),
            ['data placeholder']
        );

        return $next($request);
    }
}