<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Laravel\Telescope\Telescope;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        Model::unguard();

        if ($this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);

            Telescope::ignoreMigrations();
        }
    }
}
