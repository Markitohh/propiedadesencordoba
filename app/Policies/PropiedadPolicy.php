<?php

namespace App\Policies;

use App\Models\Propiedad;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PropiedadPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->rol === 2;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Propiedad $propiedad): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->rol === 2;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Propiedad $propiedad): bool
    {
        return $user->id === $propiedad->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Propiedad $propiedad): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Propiedad $propiedad): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Propiedad $propiedad): bool
    {
        return false;
    }
}
