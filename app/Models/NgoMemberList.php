<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoMemberList extends Model
{
    use HasFactory;

    public $table = "ngo_member_lists";

    protected $fillable = [
        'name',
        'name_slug',
        'desi',
        'dob',
        'nid_no',
        'phone',
        'father_name',
        'present_address',
        'permanent_address',
        'name_supouse',
        'time_for_api',
        'user_id',
        'verified_file',

         ];
}
