<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'iamge',
        'price',
        'category_id',
    ];
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    public function product_details()
    {
        return $this->hasOne(ProductDetail::class);
    }
    public function oders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

  
}
