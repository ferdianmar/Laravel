<?php

namespace App\Models;

use App\Jabatan;
use App\Anggota;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $table = 'gaji';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama', 'posisi', 'gaji', 'lembur', 'total_gaji', 'tanggal', 'keterangan'];

    public function jabatan()
    {
        return $this->belongsTo('App\Models\Jabatan', 'posisi', 'id');
    }

    public function anggota()
    {
        return $this->belongsTo('App\Models\Anggota', 'nama', 'id');
    }
}
