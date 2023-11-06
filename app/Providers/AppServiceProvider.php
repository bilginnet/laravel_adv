<?php

namespace App\Providers;

use App\Services\Advertising\AdvertisingService;
use App\Services\Advertising\Contracts\AdvertisingServiceInterface;
use App\Services\Advertising\Contracts\InsightsServiceInterface;
use App\Services\Advertising\InsightsService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AdvertisingServiceInterface::class, AdvertisingService::class);
        $this->app->bind(InsightsServiceInterface::class, InsightsService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
