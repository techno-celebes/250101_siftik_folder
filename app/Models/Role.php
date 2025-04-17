<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 	 	 	 	
class Role extends Model
{
    protected $table = "roles";
	protected $primaryKey = 'role_id';

    protected $fillable = [
        'role_name','role_id','created_at','updated_at'
    ];

}
