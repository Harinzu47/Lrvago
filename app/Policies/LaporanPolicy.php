<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Laporan;

class LaporanPolicy
{
    /**
     * Menentukan apakah user bisa melihat semua laporan.
     * Hanya 'admin_penjualan' dan 'owner' yang bisa melihat daftar laporan.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin_penjualan', 'owner']);
    }

    /**
     * Menentukan apakah user bisa melihat laporan tertentu.
     */
    public function view(User $user, Laporan $laporan): bool
    {
        return in_array($user->role, ['admin_penjualan', 'owner']);
    }

    /**
     * Menentukan apakah user bisa membuat laporan.
     * Hanya 'admin_penjualan' yang bisa mengunggah laporan.
     */
    public function create(User $user): bool
    {
        return $user->role === 'admin_penjualan';
    }

    /**
     * Menentukan apakah user bisa mengedit laporan.
     * Admin penjualan bisa edit laporannya sendiri sebelum divalidasi.
     */
    public function update(User $user, Laporan $laporan): bool
    {
        return $user->role === 'admin_penjualan' && $laporan->status === 'pending';
    }

    /**
     * Menentukan apakah user bisa menghapus laporan.
     * Tidak ada yang bisa menghapus laporan.
     */
    public function delete(User $user, Laporan $laporan): bool
    {
        return false;
    }

    /**
     * Menentukan apakah user bisa memvalidasi laporan.
     * Hanya 'owner' yang bisa melakukan validasi.
     */
    public function validate(User $user, Laporan $laporan): bool
    {
        return $user->role === 'owner' && $laporan->status === 'pending';
    }

    public function download(User $user, Laporan $laporan): bool
    {
        return $user->role === 'owner';
    }
}



