<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignProduct extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'tbl_assigned_prod_id';
    protected $table = 'tbl_assigned_products';
}
