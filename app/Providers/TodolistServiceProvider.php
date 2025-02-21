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
    // public array $singletons = [TodolistService::class => TodolistServiceImpl::class];
    public function register(): void
    {
        $this->app->singleton(TodolistService::class, TodolistServiceImpl::class);
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
        return [TodolistService::class];
    }
}
