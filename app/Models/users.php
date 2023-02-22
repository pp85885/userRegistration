<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role_id',
        'email',
        'phone',
        'password',
        'address',
        'country',
        'state',
        'city',
        'zip_code'
    ];

    // protected $hidden = [
    //     'password',
    // ];
}
