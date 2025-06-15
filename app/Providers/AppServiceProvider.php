<?php

namespace App\Providers;

use App\Api\v1\RepositoryInterface;
use App\Repositories\Api\v1\ChatRepository;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RepositoryInterface::class, ChatRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}
}
