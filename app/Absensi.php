<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
  protected $table='absensi';
  protected $fillable=['id_jadwal','id_user','foto','verifikasi','status'];

  public function user(){
    return $this->belongsTo(User::class);
  }
  public function jadwal(){
    return $this->belongsTo(Jadwal::class);
  }
}
