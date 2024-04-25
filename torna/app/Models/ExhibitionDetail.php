<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExhibitionDetail extends Model
{
    use HasFactory;

    protected $table = 'mst_tbl_exhibition_details';
    protected $primaryKey = 'tbl_ex_id';

    protected $fillable = [
        'tbl_com_id',
        'exhibition_name',
        'ex_from_date',
        'ex_to_date',
        'start_time',
        'end_time',
        'venue',
        'organized_by',
        'notify_by',
        'company_logo',
        'ex_country',
        'ex_city',
        'venue',
        'industry',
        'exhibition_website',
        'attach_document',
        'start_time',
        'end_time',
        'active_status',
        'created_by',
        'created_date',
        'created_time',
        'updated_by',
        'updated_date',
        'updated_time',
        'registration_url',
        'flag',
    ];
}
