<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class product_variant extends Model
{
    use HasFactory;

    public $table ='product_variants';
    protected $fillable = [
        'product_id',
        'shelves_id',
        'name',
        'image',
        'price',
        'quantity'
    ]; 

    public function product(){
        return $this->HasOne(product::class,'id','product_id');
    }
}
