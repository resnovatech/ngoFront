<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoMemberNidPhoto extends Model
{
    use HasFactory;

    public $table = "ngo_member_nid_photos";

    protected $fillable = [
        'person_name',
        'person_image',
        'person_nid_copy',
        'person_nid_copy_size',
        'time_for_api',
        'user_id',

    ];
}
