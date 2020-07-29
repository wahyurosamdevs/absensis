<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
  protected $table ='users'; 
  protected $fillable = [
      'name', 'email','telepon','bagian','alamat','email','username', 'password','is_admin','is_atasan'
  ];
}
