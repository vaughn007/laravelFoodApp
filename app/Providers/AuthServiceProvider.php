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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        

        //defined function takes two arguments, the first argument is the name of the gate
        // name should reflect what we are trying to allow to the user
        //connect_hobby_tag include Attach and Detach 
        // second argument in this define function is a closure.
        //Closure gets 2 arguments, the first argument will be our currently logged in user
        //and the second argument will be our current hobby.

        Gate::define('connect_hobby_tag', function($user, $hobby){
            return $user->id === $hobby->user_id ||auth()->user()->role === 'admin';
        });
    }
}
