<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = [
        'company_name',
        'reg_no',
        'founded_year',
        'no_of_employees',
        'company_desc',
        'company_website',
        'headquarters_address',
        'city',
        'province',
        'postal_code',
        'country',
        'mpn',
        'business_email',
        'lastname',
        'job_title',
        'department',
        'dpn',
        'user_id',
    ];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
