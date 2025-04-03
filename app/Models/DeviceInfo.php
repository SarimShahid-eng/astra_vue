<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceInfo extends Model
{
    protected $fillable = [
        'configuration_id',
        'serial_number',
        'manufacture_date',
        'expiration_date',
        'user_id',
    ];
    use HasFactory;
    public function device_configuration()
    {
        return $this->belongsTo(DeviceConfiguration::class, 'configuration_id');
    }
}
