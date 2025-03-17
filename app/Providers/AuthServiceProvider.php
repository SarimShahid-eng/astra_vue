<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        // $this->registerPolicies();

        // Gate::define("insert", function (User $user, $name) {
        //     $perm = Permission::where("role_id",$user->role)
        //     ->where("menu_name",$name)
        //     ->first();
        //     // dd($perm);
        //     if($perm->insert == 1) {
        //         return true;
        //     }else{
        //         return false;
        //     }
        // });
        // Gate::define("view", function (User $user, $name) {
        //     $perm = Permission::where("role_id",$user->role)
        //     ->where("menu_name",$name)
        //     ->first();
        //     if($perm->view == 1) {
        //         return true;
        //     }else{
        //         return false;
        //     }
        // });
        // Gate::define("edit", function (User $user, $name) {
        //     $perm = Permission::where("role_id",$user->role)
        //     ->where("menu_name",$name)
        //     ->first();
        //     if($perm->update == 1) {
        //         return true;
        //     }else{
        //         return false;
        //     }
        // });
        // Gate::define("delete", function (User $user, $name) {
        //     $perm = Permission::where("role_id",$user->role)
        //     ->where("menu_name",$name)
        //     ->first();
        //     if($perm->delete == 1) {
        //         return true;
        //     }else{
        //         return false;
        //     }
        // });
    }
}
