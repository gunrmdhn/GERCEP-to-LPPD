<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
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

        Gate::define('dinkes', function () {
            return auth()->user()->peran == 'DINKES';
        });
        Gate::define('pupr', function () {
            return auth()->user()->peran == 'PU & PR';
        });
        Gate::define('dinpend', function () {
            return auth()->user()->peran == 'DINPEND';
        });
        Gate::define('satpolpp', function () {
            return auth()->user()->peran == 'SATPOL PP';
        });
        Gate::define('dinsos', function () {
            return auth()->user()->peran == 'DINSOS';
        });
        Gate::define('kabag', function () {
            return auth()->user()->peran == 'KEPALA BAGIAN';
        });
        Gate::define('sekda', function () {
            return auth()->user()->peran == 'SEKRETARIS DAERAH';
        });
    }
}
