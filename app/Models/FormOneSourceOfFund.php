<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormOneSourceOfFund extends Model
{
    use HasFactory;

    public $table = "form_one_source_of_funds";



    protected $fillable = [
        'fd_one_form_id',
        'address',
        'name',
        'letter_file',
        'time_for_api',
    ];

    public function fd_one_form()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }
}
