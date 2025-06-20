<?php

namespace App\Policies;

use App\Models\User;

class InformationPolicy
{

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->role == 'admin';
    }

}
