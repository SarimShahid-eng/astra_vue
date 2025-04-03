<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceConfiguration extends Model
{
    protected $fillable = [
        'product_id',
        'configuration',
        'sku',
        'description',
    ];
    use HasFactory;
    public function device_product()
    {
        return $this->belongsTo(DeviceProduct::class, 'product_id');
    }
}
