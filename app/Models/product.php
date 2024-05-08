<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'image',
        'price'
    ];

    public function category(){
        return $this->hasOne(category::class,'id','category_id');
    }

    public function variant(){
        return $this->hasMany(product_variant::class);
    }
}
