<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdiMk extends Model
{

    protected $table = 'prodi_mk';
    protected $primaryKey = 'prodi_mk_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = [
        'prodi_id',
        'prodi_mk_name',
    ];
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'prodi_id');
    }
}
