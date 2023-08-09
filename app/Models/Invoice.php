<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'shipping_address',
        'total',
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
