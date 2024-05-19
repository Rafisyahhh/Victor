<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;
    protected $table = 'lowongans';
    protected $primaryKey = 'id';
    protected $fillable = ['id_perusahaan', 'gaji','tempat_kerja','waktu_kerja','nama_posisi','ketentuan_kerja'];
    public function perusahaan(){
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan','id');
    }
}
