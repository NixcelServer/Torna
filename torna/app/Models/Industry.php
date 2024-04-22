<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

    protected $table = 'mst_tbl_industry';
    protected $primaryKey = 'tbl_industry_id';
    public $timestamps = false; // If you don't need timestamps in this model
    protected $fillable = [
        'industry_name',
        'updated_date',
        'updated_time',

    ];
}
