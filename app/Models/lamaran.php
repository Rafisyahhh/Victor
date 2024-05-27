<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lamaran extends Model
{
    use HasFactory;
    protected $table = 'lamarans';
    protected $primaryKey = 'id';
    protected $fillable = ['id_user', 'id_lowongan','id_cv','id_pengalaman','id_keahlian','id_pendidikan','status','message'];
    public function lowongan(){
        return $this->belongsTo(Lowongan::class, 'id_lowongan','id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_user','id');
    }
    public function pengalaman(){
        return $this->belongsTo(Pengalaman::class, 'id_pengalaman','id');
    }
    public function pendidikan(){
        return $this->belongsTo(Pendidikan::class, 'id_pendidikan','id');
    }
    public function keahlian(){
        return $this->belongsTo(Keahlian::class, 'id_keahlian','id');
    }
    public function cv(){
        return $this->belongsTo(Cv::class, 'id_cv','id');
    }
}
