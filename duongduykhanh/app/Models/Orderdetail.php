<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orderdetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='duongduykhanhorderdetails';
    public $timestamps =true;
    protected $fillable = [
        'orderId',
        'productId',
        'price',
        'quantity',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'productId');
    }
}
