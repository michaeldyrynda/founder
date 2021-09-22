<?php

namespace App\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use Laravel\Horizon\Horizon;
use Laravel\Horizon\HorizonApplicationServiceProvider;

class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    public function boot()
    {
        parent::boot();

        // Horizon::routeSmsNotificationsTo('15556667777');
        // Horizon::routeMailNotificationsTo('example@example.com');
        // Horizon::routeSlackNotificationsTo('slack-webhook-url', '#channel');

        // Horizon::night();
    }

    protected function gate()
    {
        Gate::define('viewHorizon', function ($user = null) {
            if (blank($user) && ! blank($token = $this->getObserverSecret())) {
                return request()->bearerToken() === $token;
            }

            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Fetch the token used for Observer.
     *
     * @see https://observer.dev
     *
     * @return string|null
     */
    protected function getObserverSecret(): ?string
    {
        return Arr::get($this->app['config']->get('services'), 'observer.secret');
    }
}
