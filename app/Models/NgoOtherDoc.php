<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoOtherDoc extends Model
{
    use HasFactory;

    public $table = "ngo_other_docs";

    protected $fillable = [
        'pdf_file_list',
        'time_for_api',
        'user_id',

    ];
}
