<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Services\RequestActivityLoggerInterface;
use App\Services\DummyRequestActivityLogger;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RequestActivityLoggerInterface::class, function () {
            if (App::environment('production')) {
                return $this->app->make(RequestActivityLoggerInterface::class);
            } else {
                return $this->app->make(DummyRequestActivityLogger::class);
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        // Paginator::defaultView('paginator');
    }
}
