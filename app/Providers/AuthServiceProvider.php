<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin',function (User $user) {
            return $user->role_id == 1;
        });
        Gate::define('verified',function (User $user) {
            return $user->email_verified_at != null;
        });
        // Gate::define('verified-before-login',function () {
        //     $user = User::find(21);
        //     return $user->email_verified_at != null;
        // });
    }
}
