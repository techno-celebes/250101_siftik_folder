<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 	 	 	 	
class Teacher extends Model
{
    protected $table = "teachers";
	protected $primaryKey = 'teacher_id';

    protected $fillable = [
        'user_id','created_at','updated_at'
    ];

}
