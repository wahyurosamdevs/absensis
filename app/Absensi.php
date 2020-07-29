<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
  protected $table='absensi';
  protected $fillable=['id_jadwal','id_user','foto','verifikasi','status'];
}
