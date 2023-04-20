<?php

namespace App\Policies;

use App\Models\Communaute;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommunautePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Communaute  $communaute
     * @return mixed
     */
    public function view(User $user, Communaute $communaute)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Communaute  $communaute
     * @return mixed
     */
    public function update(User $user, Communaute $communaute)
    {
        //
        return ($user->id === $communaute->user->id || $user->hasAnyRoles(['superAdministrateur','administrateur','moderateur']));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Communaute  $communaute
     * @return mixed
     */
    public function delete(User $user, Communaute $communaute)
    {
        //
        return ($user->id === $communaute->user->id || $user->hasAnyRoles(['superAdministrateur','administrateur','moderateur']));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Communaute  $communaute
     * @return mixed
     */
    public function restore(User $user, Communaute $communaute)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Communaute  $communaute
     * @return mixed
     */
    public function forceDelete(User $user, Communaute $communaute)
    {
        //
    }
}
