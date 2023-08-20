<?php

namespace App\Models;
use App\Model\Product_order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'deliveryStatus',
        'vehicle',
        'customer_id',
        'product_id',
        'product_details',
        'product2_id',
        'Product1_quantity',
        'Product2_quantity'
    
    ];
   


    public function product1()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    
    public function product2()
    {
        return $this->belongsTo(Product::class, 'product2_id');
    }



}