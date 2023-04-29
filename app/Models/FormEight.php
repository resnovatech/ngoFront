<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormEight extends Model
{
    use HasFactory;

    public $table = "form_eights";

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
        'edu_quali',
        'profession',
        'job_des',
        'service_status',
        'remarks',
        'total_year',
        'to_date',
        'form_date',
        'user_id',
        'time_for_api',
        'complete_status',
        'verified_form_eight',

        ];


        public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
