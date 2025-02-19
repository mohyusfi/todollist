<?php

namespace App\Providers;

use App\Services\TodolistService;
use App\Services\TodolistServiceImpl\TodolistServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class TodolistServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(TodolistService::class, function($app): TodolistServiceImpl {
            return new TodolistServiceImpl();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    public function provides(): array
    {
        return [
            TodolistService::class => TodolistServiceImpl::class
        ];
    }
}
