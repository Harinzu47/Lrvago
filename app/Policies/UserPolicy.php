<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user): bool
    {
        // Hanya pengguna dengan role 'owner' dan 'admin_penjualan' yang bisa melihat resource ini
        return in_array($user->role, ['admin_penjualan', 'owner']);
    }
}
