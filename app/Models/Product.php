<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'code', 'name', 'lvl_1', 'lvl_2', 'lvl_3', 'price', 'priceSP', 'count', 'properties', 'purchases' , 'unit', 'image', 'on_main_page', 'description'
    ];

}
