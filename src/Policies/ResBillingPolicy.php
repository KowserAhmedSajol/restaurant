<?php

namespace restaurant\restaurant\Policies;

use restaurant\restaurant\Models\ResBilling;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResBillingPolicy
{
    use HandlesAuthorization;

    public function view(User $user, ResBilling $model)
    {
        return true; // Update with your logic
    }

    public function create(User $user)
    {
        return true; // Update with your logic
    }

    public function update(User $user, ResBilling $model)
    {
        return true; // Update with your logic
    }

    public function delete(User $user, ResBilling $model)
    {
        return true; // Update with your logic
    }
}