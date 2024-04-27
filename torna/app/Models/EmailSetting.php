<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSetting extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_email_settings';
    protected $primaryKey = 'tbl_email_setting_id';
}
