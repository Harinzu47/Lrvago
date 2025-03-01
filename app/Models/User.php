<?php

namespace App\Models;

use Filament\Panel;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Foundation\Auth\Access\Authorizable;

class User extends Authenticatable implements FilamentUser, AuthorizableContract
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relasi ke Order
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Menentukan akses ke Filament Panel
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return in_array($this->role, [
            'owner',
            'admin_pemasaran',
            'admin_penjualan',
            'staff'
        ]);
    }

    /**
     * Periksa apakah pengguna memiliki peran tertentu
     */
    public function hasRole($roles): bool
    {
        if (is_array($roles)) {
            return in_array($this->role, $roles);
        }
        return $this->role === $roles;
    }

    /**
     * Scope query berdasarkan peran
     */
    public function scopeByRole($query, $roles)
    {
        if (is_array($roles)) {
            return $query->whereIn('role', $roles);
        }
        return $query->where('role', $roles);
    }
}
