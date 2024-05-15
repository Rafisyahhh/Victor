<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaans';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_perusahaan', 'id_kategori','no_telp','deskripsi','foto'];
    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori','id');
    }
}
