<?php

namespace App\Providers;

use App\Repositories\PasteRepositoryEloquent;
use App\Repositories\PasteRepositoryInterface;
use App\Repositories\UserRepositoryEloquent;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvaider extends ServiceProvider
{
    protected array $mappings = [
        PasteRepositoryInterface::class => PasteRepositoryEloquent::class,
        UserRepositoryInterface::class => UserRepositoryEloquent::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->mappings as $abstract => $concrete) {
            $this->app->singleton($abstract, $concrete);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
