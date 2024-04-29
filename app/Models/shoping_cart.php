<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shoping_cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'variant_id',
        'quantity_order',
        'price'
    ];
}
