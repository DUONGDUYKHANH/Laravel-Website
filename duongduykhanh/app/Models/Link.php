<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='duongduykhanhlinks';
    public $timestamps =true;
    protected $fillable = [
        'title',
        'position',
        'image',
        'link',
        'order',
        'status',
    ];
}
