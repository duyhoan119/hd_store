<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'shelves_id',
        'name',
        'image',
        'price',
        'quantity'
    ]; 
}
