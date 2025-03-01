<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'payment_method',
        'payment_status',
        'status',
        'currency',
        'shipping_amount',
        'shipping_method',
        'notes'
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($order) {
            if (in_array($order->getOriginal('status'), ['shipped', 'delivered'])) {
                throw ValidationException::withMessages([
                    'status' => 'Status tidak dapat diubah setelah dikirim atau diterima.'
                ]);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function address()
    {
        return $this->hasOne(Adress::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function laporan()
    {
        return $this->hasOne(Laporan::class);
    }
}
