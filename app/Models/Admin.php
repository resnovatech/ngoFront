<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'department',
        'phone_office',
        'inter_com',
        'mobile_number',
        'address',
        'image',
        'nid',
        'start_date',
        'end_date',
        'email',
        'password',
        'status',
    ];
}
