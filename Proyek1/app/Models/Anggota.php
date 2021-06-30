<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function jabatan()
    {
        return $this->belongsTo('App\Models\Jabatan', 'posisi', 'id');
    }

    public function gaji()
    {
        return $this->hasMany('App\Models\Gaji', 'nama', 'id');
    }
}
