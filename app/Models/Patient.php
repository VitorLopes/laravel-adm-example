<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;

    protected $fillable = ['name',
        'address',
        'address_number',
        'zipcode',
        'birthday',
        'city_id'
    ];

    protected $table = 'patients';
    protected $primaryKey = 'id';
}
