<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table='jadwals';
    protected $fillable=['tanggal','id_user','deskripsi'];

    public function user(){
      return $this->belongsTo(User::class);
    }
    public function absensi(){
      return $this->hasOne(Absensi::class);
    }
}
