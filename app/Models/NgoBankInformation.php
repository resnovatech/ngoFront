<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoBankInformation extends Model
{
    use HasFactory;

    protected $table = "ngo_bank_information";

    protected $fillable = [
        'user_id',
        'account_number',
        'account_type',
        'name_of_bank',
        'branch_name_of_bank',
        'bank_address',
        'status'

];
}
