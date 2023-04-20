<?php

namespace App\Providers;

use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Auth\Access\Response;
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
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Gate
        Gate::define('manage-users', function ($user) {
         return $user->hasAnyRoles(['superAdministrateur','administrateur','moderateur'])
                ? Response::allow()
                : Response::deny('Accès non autorisé à cette page.');
           });

        Gate::define('super-admin', function ($user) {
         return $user->hasAnyRoles(['superAdministrateur','administrateur'])
                ? Response::allow()
                : Response::deny('Accès non autorisé à cette page.');
           });

        Gate::define('gestion-utilisateur', function ($user) {
                 return $user->gestionUtilisateur()
                        ? Response::allow()
                        : Response::deny('Accès non autorisé à cette page.');
                   });
        





    }
}
