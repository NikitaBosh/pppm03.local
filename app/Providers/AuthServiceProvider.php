<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Mediateka::class => MediatekaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

                // Определение является ли пользователь администратором
        Gate::define('admin', function ($user) {
            if ($user->role == 'admin') {
                return true;
            }
            return false;
        });

        // Определение обычного зарегистрированного пользователя
        Gate::define('user', function ($user) {
            if ($user->role == 'user') {
                return true;
            }
            return false;
        });
    }
}
