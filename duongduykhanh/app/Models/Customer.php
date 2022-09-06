<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='duongduykhanhcustomers';
    public $timestamps =true;
    protected $fillable = [
        'customerName',
        'address',
        'phone',
        'email',
        'password',
    ];
}
