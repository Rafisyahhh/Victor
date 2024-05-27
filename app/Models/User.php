<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'nama',
        'jenis_kelamin',
        'avatar',
        'tempat_lahir',
        'tgl_lahir',
        'no_telp',
        'alamat',
        'id_pengalaman',
        'id_pendidikan',
        'id_keahlian',
        'id_cv',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
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
