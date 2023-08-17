<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'price',
        'quantity',
        'user_id',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function invoices()
    {
        return $this->hasOne(Invoice::class);
    }
}
