<?php

namespace App\Policies;

use App\Models\Parts;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartsPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        // Check if the user has permission to view all parts
        return $user->hasPermission('view-parts');
    }

    public function view(User $user, Parts $part)
    {
        // Check if the user has permission to view the specific part
        return $user->hasPermission('view-parts');
    }

    public function create(User $user)
    {
        // Check if the user has permission to create parts
        return $user->hasPermission('create-parts');
    }

    public function update(User $user, Parts $part)
    {
        // Check if the user has permission to update the specific part
        return $user->hasPermission('update-parts');
    }

    public function delete(User $user, Parts $part)
    {
        // Check if the user has permission to delete the specific part
        return $user->hasPermission('delete-parts');
    }
}
