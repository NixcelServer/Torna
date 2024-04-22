<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'mst_tbl_documents'; // Specify the table name

    protected $primaryKey = 'tbl_doc_id'; // Specify the primary key column name

    protected $fillable = [
        // 'mst_tbl_ex_id',
        'doc_name',
        'doc_type',
        'doc_url',
        'document_attachment',
        'doc_description',
        'product_name',
        'product_id',
        'active_status',
        'created_by',
        'created_date',
        'created_time',
        'updated_by',
        'updated_date',
        'updated_time',
        'flag',
    ];

    // Define relationships if needed
    // public function exhibition()
    // {
    //     return $this->belongsTo(Exhibition::class, 'mst_tbl_ex_id', 'mst_tbl_ex_id');
    // }
}
