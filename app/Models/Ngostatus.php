<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoStatus extends Model
{
    use HasFactory;

    public $table = "ngo_statuses";

    protected $fillable = [
        'email',
        'reg_type',
        'reg_id',
        'print_date',
        'status',
        'user_id',

    ];
}
