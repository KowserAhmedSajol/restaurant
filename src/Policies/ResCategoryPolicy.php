<?php

namespace restaurant\restaurant\Policies;

use restaurant\restaurant\Models\ResCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResCategoryPolicy
{
    use HandlesAuthorization;

    public function view(User $user, ResCategory $model)
    {
        return true; // Update with your logic
    }

    public function create(User $user)
    {
        return true; // Update with your logic
    }

    public function update(User $user, ResCategory $model)
    {
        return true; // Update with your logic
    }

    public function delete(User $user, ResCategory $model)
    {
        return true; // Update with your logic
    }
}