<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shelves extends Model
{
    use HasFactory;

    protected $fillable = [
        'warehouse_id',
        'name'
    ];
}
