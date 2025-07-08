<?php

namespace App\Policies;

use App\Models\User;

class DashbordPolicy
{
    public function dashbord(User $user)
    {
        return $user->role == 'admin';
    }
}
