<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Cells
        Gate::define('cell_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('cell_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('cell_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('cell_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('cell_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Churches
        Gate::define('church_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('church_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('church_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('church_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('church_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Medias
        Gate::define('media_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('media_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('media_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('media_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('media_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Testimonies
        Gate::define('testimony_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('testimony_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('testimony_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('testimony_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('testimony_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Partnerships
        Gate::define('partnership_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('partnership_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('partnership_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('partnership_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('partnership_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
