<?php

namespace App\Policies;

use App\Models\His_Eva;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HisEvaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\His_Eva  $hisEva
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, His_Eva $hisEva)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\His_Eva  $hisEva
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, His_Eva $hisEva)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\His_Eva  $hisEva
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, His_Eva $hisEva)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\His_Eva  $hisEva
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, His_Eva $hisEva)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\His_Eva  $hisEva
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, His_Eva $hisEva)
    {
        //
    }
}
