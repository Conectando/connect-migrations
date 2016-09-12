<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\TestRepository::class, \App\Repositories\TestRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PlaneaRepository::class, \App\Repositories\PlaneaRepositoryEloquent::class);
        //:end-bindings:
    }
}
