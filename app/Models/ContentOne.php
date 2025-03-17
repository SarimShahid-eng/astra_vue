<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentOne extends Model
{
    use HasFactory;
    protected $fillable = [
        'content1',
        'content2',
        'content3',
        'content4',
    ];
    function product(){ 
        return $this->hasOne(Product::class,'id','content4');
    }
}
