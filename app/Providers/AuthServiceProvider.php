<?php

namespace App\Providers;

use App\Role;
use App\User;
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

        
        // Auth gates for: Schools
        Gate::define('school_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('school_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('school_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('school_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('school_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Schoolarships
        Gate::define('schoolarship_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('schoolarship_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('schoolarship_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('schoolarship_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('schoolarship_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Exam papers
        Gate::define('exam_paper_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('exam_paper_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('exam_paper_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('exam_paper_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('exam_paper_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Ministry
        Gate::define('ministry_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('ministry_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('ministry_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('ministry_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('ministry_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

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
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
