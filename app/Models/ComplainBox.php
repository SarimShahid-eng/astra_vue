<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplainBox extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','title','purchase_date','subject','product_id','message'];
    function user()  {
        return $this->belongsTo(User::class,'user_id');
    }
    function product()  {
        return $this->belongsTo(Product::class,'product_id');
        
    }
}
