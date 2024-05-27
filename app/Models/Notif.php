<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    use HasFactory;
    protected $table = 'notifs';
    protected $primaryKey = 'id';
    protected $fillable = ['id_lamaran', 'status','message','id_user'];
    public function lamaran(){
        return $this->belongsTo(Lamaran::class, 'id_lamaran','id');
    }
}
