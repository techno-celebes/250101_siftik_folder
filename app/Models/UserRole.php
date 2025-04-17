<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 	 	 	 	
class UserRole extends Model
{
    protected $table = "user_roles";
	protected $primaryKey = 'user_role_id';

    protected $fillable = [
        'user_id','role_id','created_at','updated_at'
    ];

}
