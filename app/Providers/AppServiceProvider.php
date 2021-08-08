<?php

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\ServiceProvider;
use Laravel\Telescope\Telescope;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        Model::unguard();

        Date::use(CarbonImmutable::class);

        if ($this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);

            Telescope::ignoreMigrations();
        }
    }
}
