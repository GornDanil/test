<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    protected array $mappings = [
        \App\Services\Authentication\Abstracts\AuthenticationServiceInterface::class => \App\Services\Authentication\AuthenticationService::class,
        \App\Services\Pasted\Abstracts\PastedServiceInterface::class => \App\Services\Pasted\PastedService::class,
    ];

    public function register()
    {
        foreach ($this->mappings as $abstract => $concrete) {
            $this->app->singleton($abstract, $concrete);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
