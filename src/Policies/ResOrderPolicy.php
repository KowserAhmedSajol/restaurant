<?php

namespace restaurant\restaurant\Policies;

use restaurant\restaurant\Models\ResOrder;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResOrderPolicy
{
    use HandlesAuthorization;

    public function view(User $user, ResOrder $model)
    {
        return true; // Update with your logic
    }

    public function create(User $user)
    {
        return true; // Update with your logic
    }

    public function update(User $user, ResOrder $model)
    {
        return true; // Update with your logic
    }

    public function delete(User $user, ResOrder $model)
    {
        return true; // Update with your logic
    }
}