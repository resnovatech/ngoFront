<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormOneAdviserList extends Model
{
    use HasFactory;


    public $table = "form_one_adviser_lists";

    protected $fillable = [
        'fd_one_form_id',
        'name',
        'information',
        'time_for_api',

];


    public function fd_one_form()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }


}
