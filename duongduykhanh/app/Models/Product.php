<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='duongduykhanhproducts';
    public $timestamps =true;
    protected $fillable = [
        'productName',
        'slug',
        'catId',
        'brandId',
        'detail',
        'price',
        'salePrice',
        'image',
        'status',
    ];
}
