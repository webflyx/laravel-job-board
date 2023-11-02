<?php

namespace App\Policies;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EmployerPolicy
{

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Employer $employer): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return $user->employer === null;
    }

    public function update(User $user, Employer $employer): bool
    {
        return $user->id === $employer->id;
    }

    public function delete(User $user, Employer $employer): bool
    {
        return false;
    }

    public function restore(User $user, Employer $employer): bool
    {
        return false;
    }

    public function forceDelete(User $user, Employer $employer): bool
    {
        return false;
    }
}
