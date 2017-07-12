<?php

namespace DeliveryQuick\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Carbon\Carbon;

class AuthServiceProvider extends ServiceProvider {

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'DeliveryQuick\Model' => 'DeliveryQuick\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {
        $this->registerPolicies();

        Passport::routes();
        
        Passport::tokensExpireIn(Carbon::now()->addMinute(10));

        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
    }
}
