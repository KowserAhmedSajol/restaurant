<?php

namespace restaurant\restaurant\Policies;

use restaurant\restaurant\Models\ResOrderItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResOrderItemPolicy
{
    use HandlesAuthorization;

    public function view(User $user, ResOrderItem $model)
    {
        return true; // Update with your logic
    }

    public function create(User $user)
    {
        return true; // Update with your logic
    }

    public function update(User $user, ResOrderItem $model)
    {
        return true; // Update with your logic
    }

    public function delete(User $user, ResOrderItem $model)
    {
        return true; // Update with your logic
    }
}