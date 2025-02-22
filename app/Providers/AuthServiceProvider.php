<?php

namespace App\Providers;

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

        // Selft defined 
        Gate::define('edit-settings', function ($user) {
            return $user->isAdmin;
        });

        Gate::define('update-post', function ($user, $post) {
            return $user->id === $post->user_id;
        });

        /**
         * Manage publication of Company and New POI's 
         */
        Gate::define('can-publish', function ($user, $post) {
            return $user->isAdmin;
        });



        /**
         * Manages Company 
         */

        //delete company
        Gate::define('delete-company', function ($user, $company) {
            return $user->isAdmin || $user->id === $company->user_id;
        });
        // update company
        Gate::define('update-company', function ($user, $company) {
            return $user->isAdmin || $user->id === $company->user_id;
        });
        Gate::define('view-company', function ($user, $company) {
            return $user->isAdmin || $user->id === $company->user_id;
        });

        /**
         * Mannages Poi
         */
    }
}
