<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $table = 'mst_tbl_product_details';

    protected $primaryKey = 'tbl_product_id';

    protected $fillable = [
        'tbl_com_id',
        'product_name',
        'description',
        'category',
        'created_by',
        'created_date',
        'created_time',
        'updated_by',
        'updated_date',
        'updated_time',
        'flag',
    ];
}
