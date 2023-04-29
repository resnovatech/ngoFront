<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormOneMemberList extends Model
{
    use HasFactory;

    public $table = "form_one_member_lists";

    protected $fillable = [
        'name',
        'position',
        'address',
        'date_of_join',
        'citizenship',
        'salary_statement',
        'other_occupation',
        'now_working_at',
        'fd_one_form_id',
        'time_for_api',

    ];

    public function fd_one_form()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }
}
