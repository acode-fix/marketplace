<?php

namespace App\Providers;

use App\Interface\UserInterface;
use App\Interface\UserProductListingInterface;
use App\Repositories\UserProductListingRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind(DemoCourseInterface::class, DemoCourseRepository::class);
        $this->app->bind(UserProductListingInterface::class, UserProductListingRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
