<?php

namespace App\Providers;

use App\Repositories\Authentication\Abstracts\UserRepositoryInterface;
use App\Repositories\Authentication\UserRepositoryEloquent;
use App\Repositories\Pastes\Abstracts\PasteRepositoryInterface;
use App\Repositories\Pastes\PasteRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryProvaider extends ServiceProvider
{
    /** @var string[] */
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
