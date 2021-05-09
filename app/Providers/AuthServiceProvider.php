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
        Gate::define('admin',function($user){
            $roles = ['admin'];
            $admin = $user->roles()->whereIn('name',$roles)->first();
            if ($admin) {
                return true;
            }
            else {
                return false;
            }
            
        });
        Gate::define('author',function($user){
            $roles = ['author','admin'];
            $author = $user->roles()->whereIn('name',$roles)->first();
            if ($author) {
                return true;
            }
            else {
                return false;
            }
            
        });
         Gate::define('user',function($user){
            $roles = ['admin','user'];
            $admin = $user->roles()->whereIn('name',$roles)->first();
            if ($admin) {
                return true;
            }
            else {
                return false;
            }
            
        });

        //
    }
}
