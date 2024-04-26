<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_vistor_details';
    protected $primaryKey = 'tbl_visitor_detail_id';
}
