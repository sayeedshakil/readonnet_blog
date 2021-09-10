<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('view_this_option', fn(User $user) => $user->id==1)
        // ? Response::allow()
        // : Response::deny('You must be an administrator.');

        // Gate::define('is_super_admin', function (Post $post) {
        //     return User::find(1)
        //         ? Response::allow()
        //         : Response::deny('Forbidden!');
        // });


    }
}
