<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMSSetting extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_sms_settings';
    protected $primaryKey = 'tbl_sms_setting_id';
}
