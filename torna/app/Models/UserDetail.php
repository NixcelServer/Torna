<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class UserDetail extends Model implements Authenticatable
{
    
    use AuthenticatableTrait;
    protected $table = 'mst_tbl_user_details';

    protected $primaryKey = 'tbl_user_id';

    protected $fillable = [
        'tbl_user_id',
        'client_id',
        'company_name',
        'first_name',
        'last_name',
        'email',
        'contact_no',
        'role_id',
        'active_status',
        'created_date',
        'created_time',
        'updated_date',
        'updated_time',
        'flag',
    ];
}
