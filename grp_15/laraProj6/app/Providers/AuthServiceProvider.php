<?php

namespace App\Providers;

use App\Models\UtenteLivello1;
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

        Gate::define('view-level2-navbar', function ($user) {
            return $user instanceof Utente;
        });
        Gate::define('view-level3-navbar', function ($user) {
            return $user instanceof Utente;
        });

       
    }
}
