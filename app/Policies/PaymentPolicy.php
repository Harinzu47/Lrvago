<?php

namespace App\Policies;

use App\Models\User;

class PaymentPolicy
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
        return in_array($user->role, ['admin_penjualan', 'owner']);
    }
}
