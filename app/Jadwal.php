<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table='jadwals';
    protected $fillable=['tanggal','id_user','deskripsi','id_setupjadwal'];

    public function user(){
      return $this->belongsTo(User::class,'id_user');
    }
    public function absensi(){
      return $this->hasOne(Absensi::class,'id_jadwal');
    }
    public function setupjadwal(){
      return $this->belongsTo(SetupJadwal::class,'id_setupjadwal');
    }
}
