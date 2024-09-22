<?php

namespace restaurant\restaurant\Policies;

use restaurant\restaurant\Models\ResTax;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResTaxPolicy
{
    use HandlesAuthorization;

    public function view(User $user, ResTax $model)
    {
        return true; // Update with your logic
    }

    public function create(User $user)
    {
        return true; // Update with your logic
    }

    public function update(User $user, ResTax $model)
    {
        return true; // Update with your logic
    }

    public function delete(User $user, ResTax $model)
    {
        return true; // Update with your logic
    }
}