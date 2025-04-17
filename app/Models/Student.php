<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 	 	 	 	
class Student extends Model
{
    protected $table = "students";
	protected $primaryKey = 'student_id';

    protected $fillable = [
        'user_id','created_at','updated_at'
    ];

}
