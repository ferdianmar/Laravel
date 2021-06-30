<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatan';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama_posisi'];

    public function anggota()
    {
        return $this->hasMany('App\Models\Anggota', 'posisi', 'id');
    }

    public function gaji()
    {
        return $this->hasMany('App\Models\Gaji', 'posisi', 'id');
    }
}
