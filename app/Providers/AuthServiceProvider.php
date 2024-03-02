<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        Gate::define('dashboard', function($user){
            return $user->is_admin;
        });


          /* this Gate with method before will apply before all previous Gate 
        this action to gave autority for Admin to update or delete or both */

        // Gate::before(function ($user, $ability) {
        //      if ($user->is_admin && in_array($ability, ['delete', 'restore'])) {
        //         return true;
        //      }
        //  });

        
    }
}
