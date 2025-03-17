<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'sub_category',
        'name',
        'weight',
        'dimensions',
        'size',
        'warranty_years',
        'check_data',
        'serial_num',
        'detail',
        'more_detail',
        'description',
        'product_images',
    ];

    protected $casts = [
        'product_images' => 'array',
    ];

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function catgory()
    {
        return $this->hasOne(Category::class,'id','category');
    }
    public function sub_catgory()
    {
        return $this->hasOne(SubCategory::class,'id','sub_category');
    }
}
