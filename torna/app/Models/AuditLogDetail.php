<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLogDetail extends Model
{
    use HasFactory;

    protected $table = 'mst_tbl_auditlog_details';
    public $timestamps = false;
    protected $primaryKey = 'tbl_auditlog_detail_id';
}
