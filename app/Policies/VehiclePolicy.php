<?php

namespace App\Policies;

use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VehiclePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        // Check if the user has permission to view all vehicles
        return $user->hasPermission('view-vehicles');
    }

    public function view(User $user, Vehicle $vehicle)
    {
        // Check if the user has permission to view the specific vehicle
        return $user->hasPermission('view-vehicles');
    }

    public function create(User $user)
    {
        // Check if the user has permission to create vehicles
        return $user->hasPermission('create-vehicles');
    }

    public function update(User $user, Vehicle $vehicle)
    {
        // Check if the user has permission to update the specific vehicle
        return $user->hasPermission('update-vehicles');
    }

    public function delete(User $user, Vehicle $vehicle)
    {
        // Check if the user has permission to delete the specific vehicle
        return $user->hasPermission('delete-vehicles');
    }
}
