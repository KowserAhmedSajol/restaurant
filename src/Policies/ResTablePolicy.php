<?php

namespace restaurant\restaurant\Policies;

use restaurant\restaurant\Models\ResTable;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResTablePolicy
{
    use HandlesAuthorization;

    public function view(User $user, ResTable $model)
    {
        return true; // Update with your logic
    }

    public function create(User $user)
    {
        return true; // Update with your logic
    }

    public function update(User $user, ResTable $model)
    {
        return true; // Update with your logic
    }

    public function delete(User $user, ResTable $model)
    {
        return true; // Update with your logic
    }
}