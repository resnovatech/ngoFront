<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdOneForm extends Model
{
    use HasFactory;

    public $table = "fboneforms";

    protected $fillable = [
        'registration_number',
        'registration_number_given_by_admin',
        'organization_name',
        'organization_name_ban',
        'organization_address',
        'address_of_head_office',
        'address_of_head_office_eng',
        'country_of_origin',
        'name_of_head_in_bd',
        'job_type',
        'address',
        'phone',
        'email',
        'citizenship',
        'profession',
        'plan_of_operation',
        'local_address',
        'annual_budget',
        'treasury_number',
        'attach_the__supporting_papers',
        'vat_invoice_number',
        'board_of_revenue_on_fees',
        'user_id',
        'time_for_api',
        'complete_status',
        'verified_fd_one_form',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
