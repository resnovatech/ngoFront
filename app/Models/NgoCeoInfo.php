<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoCeoInfo extends Model
{
    use HasFactory;

    protected $table = "ngo_ceo_infos";

    protected $fillable = [
        'user_id',
        'ceo_name',
        'ceo_designation',
        'ceo_signature',
        'ceo_seal',
'status',
    ];


}
