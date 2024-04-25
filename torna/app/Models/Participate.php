<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participate extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_participation_details';
    protected $primaryKey = 'tbl_participation_id';
}
