<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description','images', 'price', 'stock', 'created_by'];

    protected $casts = [
        'images' => 'array',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function stockLogs()
    {
        return $this->hasMany(StockLog::class);
    }

    protected static function booted()
    {
        static::creating(function ($product) {
            if (empty($product->created_by)) {
                $product->created_by = auth()->id(); // Isi dengan ID pengguna yang sedang login
            }
        });
    }
}
