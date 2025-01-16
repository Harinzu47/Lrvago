<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'slug', 'content', 'created_by',
    ];

    public function createdBy()
    {
        return $this->belongsTo(Employee::class, 'created_by');
    }
}
