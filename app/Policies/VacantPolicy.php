<?php

namespace App\Policies;

use App\User;
use App\Vacant;
use Illuminate\Auth\Access\HandlesAuthorization;

class VacantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vacant  $vacant
     * @return mixed
     */
    public function view(User $user, Vacant $vacant)
    {
        return $user->id === $vacant->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vacant  $vacant
     * @return mixed
     */
    public function update(User $user, Vacant $vacant)
    {
        // solamnete el usuaario que la creo la va a poder editar
        return $user->id === $vacant->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vacant  $vacant
     * @return mixed
     */
    public function delete(User $user, Vacant $vacant)
    {
        return $user->id === $vacant->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vacant  $vacant
     * @return mixed
     */
    public function restore(User $user, Vacant $vacant)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Vacant  $vacant
     * @return mixed
     */
    public function forceDelete(User $user, Vacant $vacant)
    {
        //
    }
}
