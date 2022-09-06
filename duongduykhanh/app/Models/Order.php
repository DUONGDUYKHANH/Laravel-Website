<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='duongduykhanhorders';
    public $timestamps =true;
    protected $fillable = [
        'customerId',
        'total',
        'note',
        'status',
    ];

    public function customer(){
        return $this->hasOne(Customer::class, 'id', 'customerId');
    }

    public function products(){
        return $this->hasMany(Orderdetail::class, 'orderId', 'id');
    }
}
