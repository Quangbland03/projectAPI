<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'user_id',
        'product_id',
    ];
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
