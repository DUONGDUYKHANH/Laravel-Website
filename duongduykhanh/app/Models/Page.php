<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='duongduykhanhpages';
    public $timestamps =true;
    protected $fillable = [
        'title',
        'slug',
        'content',
        'summary',
        'status'
    ];
}
