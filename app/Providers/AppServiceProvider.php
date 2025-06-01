<?php

namespace App\Providers;

use App\Events\Api\v1\UserLogged;
use App\Listeners\Api\v1\UpdateStatusUser;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Event::listen(
        //     UserLogged::class,
        //     UpdateStatusUser::class,
        // );
    }
}
