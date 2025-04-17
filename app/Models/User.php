<?php

namespace App\Models;

use App\Models\Prodi;
use Illuminate\Database\Eloquent\Model;
 	 	 	 	
class User extends Model
{
    protected $table = "users";
	protected $primaryKey = 'id';

    protected $fillable = [
        'name','email','prodi_id',"email_verified_at","password",'username','remember_token','created_at','updated_at'
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'prodi_id');
    }

}
