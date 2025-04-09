<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoHeadInformation extends Model
{
    use HasFactory;

    protected $table = "ngo_head_information";

    protected $fillable = [
        'user_id',
        'chief_name',
        'chief_desi',
        'chief_signature',
        'chief_seal',
        'type',
        'status'

];


}
