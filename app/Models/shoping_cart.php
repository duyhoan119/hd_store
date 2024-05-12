<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shoping_cart extends Model
{
    use HasFactory;

    public $table = 'shoping_cart';
    protected $fillable = [
        'variant_id',
        'quantity_order',
        'user_id',
        'price' 
    ];

    public function product(){
        return $this->belongsTo(product_variant::class,'variant_id','id');
    }
}
