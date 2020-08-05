<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetupJadwal extends Model
{
    protected $table = 'setup_jadwals';
    protected $fillable = ['periode','tanggal_awal'];
    public function jadwal(){
      return $this->hasMany(Jadwal::class,'id_setupjadwal');
    }
}
