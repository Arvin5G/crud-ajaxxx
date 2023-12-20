<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;
    protected $fillable = [
        'p_name',
        'p_unit',
        'p_price',
        'p_xdate',
        'p_available',
        'p_image'
    ];
}