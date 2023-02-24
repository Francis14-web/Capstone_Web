<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderGroup extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'total_price',
        'customer_id',
        'status',
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}

