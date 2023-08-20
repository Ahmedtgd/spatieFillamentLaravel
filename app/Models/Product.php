<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('order_id','name')->withTimestamps();
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot('quantity', 'price')->withTimestamps();
    }

    public function products()
{
    return $this->belongsToMany(Product::class, 'order_product')->withPivot('order_id','name')->withTimestamps();
}
}

