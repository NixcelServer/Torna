<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_notify_details';
    protected $primaryKey = 'tbl_notify_id';
}
