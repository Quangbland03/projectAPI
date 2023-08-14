<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'user_id',
        'product_id',
    ];
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
