<?php

namespace App\Providers;


use App\Services\Authentication\Abstracts\AuthenticationServiceInterface;
use App\Services\Authentication\AuthenticationService;
use App\Services\Pasted\Abstracts\PastedServiceInterface;
use App\Services\Pasted\PastedService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /** @var string[] */
    protected array $mappings = [
        AuthenticationServiceInterface::class => AuthenticationService::class,
        PastedServiceInterface::class => PastedService::class,
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
