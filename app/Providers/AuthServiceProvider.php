<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('access_by_system', function (User $user) {
            return $user->role_id == 1 || $user->role_id == 2; 
        }); 
        Gate::define('access_by_director', function (User $user) {
            return $user->role_id == 1 || $user->role_id == 2 || $user->role_id == 4; 
        }); 
        Gate::define('access_by_chief', function (User $user) {
            return $user->role_id == 1 || $user->role_id == 2 || $user->role_id == 4 || $user->role_id == 5;
        }); 
    }
}
