<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Panel;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

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

    public static function roles(): array
    {
        return ['owner', 'admin_pemasaran', 'admin_penjualan', 'staff', 'pelanggan'];
    }

    public function setRoleAttribute($value)
    {
        if (!in_array($value, self::roles())) {
            throw new \InvalidArgumentException("Invalid role: $value");
        }
        $this->attributes['role'] = $value;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
    return $this->belongsTo(User::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
    // Daftar email yang diizinkan
    $allowedEmails = [
        'owner@gmail.com',
        'admin_pemasaran@gmail.com',
        'admin_penjualan@gmail.com',
        'staff@gmail.com'
    ];

    // Periksa apakah email pengguna ada dalam daftar yang diizinkan
    return in_array($this->email, $allowedEmails);
    }

    public function hasRole($roles): bool
    {
        if (is_array($roles)) {
            return in_array($this->role, $roles);
        }
        return $this->role === $roles;
    }   

    public function scopeByRole($query, $roles)
    {
        if (is_array($roles)) {
            return $query->whereIn('role', $roles);
        }
        return $query->where('role', $roles);
    }
}
