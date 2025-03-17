<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['cat_id', 'name'];
    function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
    function products()
    {
        return $this->hasMany(Product::class, 'sub_category');
    }
}
