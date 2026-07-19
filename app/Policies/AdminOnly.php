<?php

namespace App\Policies;

use App\Models\User;

trait AdminOnly
{
    public function before(User $user, string $ability): ?bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return false;
    }

    public function viewAny(User $user): bool
    {
        return $user->isAdmin();
    }

    public function view(User $user, mixed $model = null): bool
    {
        return $user->isAdmin();
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, mixed $model = null): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, mixed $model = null): bool
    {
        return $user->isAdmin();
    }
}
