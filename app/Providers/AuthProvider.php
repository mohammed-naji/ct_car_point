<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        foreach (Permission::all() as $per) {
            Gate::define($per->code, function (User $user) use ($per) {

                if ($user->type == 'superadmin') {
                    return true;
                }
                if ($user->role) {
                    return $user->role->permissions()->where('code', $per->code)->exists();
                }
            });
        }
    }
}
