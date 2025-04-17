<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';

    protected $primaryKey = 'prodi_id';
    public $incrementing = true;

    protected $keyType = 'int';
    public $timestamps = true;
    protected $fillable = [
        'prodi_name',
    ];

    public function prodiMks()
    {
        return $this->hasMany(ProdiMk::class, 'prodi_id', 'prodi_id');
    }
}
