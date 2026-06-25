<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itu extends Model
{
    protected $table = 'itu';
    protected $fillable = [
        'name',
        'dob',
        'gender',
        'email',
        'phone',
        'address',
    ];
}
