<?php

namespace App\Policies;

use App\Models\User;

class SettingPolicy
{

    public function update(User $user): bool
    {
        return $user->role == 'admin';
    }


    public function default(User $user): bool
    {
        return $user->role == 'admin';
    }

}
