<?php

namespace restaurant\restaurant\Policies;

use restaurant\restaurant\Models\ResProduct;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResProductPolicy
{
    use HandlesAuthorization;

    public function view(User $user, ResProduct $model)
    {
        return true; // Update with your logic
    }

    public function create(User $user)
    {
        return true; // Update with your logic
    }

    public function update(User $user, ResProduct $model)
    {
        return true; // Update with your logic
    }

    public function delete(User $user, ResProduct $model)
    {
        return true; // Update with your logic
    }
}