<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    use HasFactory;

    protected $table = 'mst_tbl_company_details';
    protected $primaryKey = 'tbl_comp_id';

    protected $fillable = [
        'company_name',
        'comp_industry',
        'comp_address',
        'fname',
        'lname',
        'uname',
        'company_name',
        'company_logo',
        'contact_no',
        'email_D',
        'comp_website',
        'comp_url',
        'active_status',
        'registered_date',
        'registered_time',
        'updated_by',
        'updated_date',
        'updated_time',
        'flag',
    ];
}
