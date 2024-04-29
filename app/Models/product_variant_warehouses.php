<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_variant_warehouses extends Model
{
    use HasFactory;

    protected $fillable = [
        'shelves_id',
        'variant_id',
        'quantity'
    ];
}
