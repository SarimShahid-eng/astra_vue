<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellProduct extends Model
{
    use HasFactory;
    protected $fillable = ['category', 'sub_cat', 'product_id', 'user_id','sell_date']; 
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class, 'sub_cat');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
