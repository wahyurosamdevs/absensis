<?php

use Illuminate\Database\Seeder;
use App\User;
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = [
          [
             'name'=>'Admin',
             'email'=>'admin@itsolutionstuff.com',
             'telepon' => '0881036419106',
             'bagian' => 'Administrasi',
             'alamat' => 'Mojokerto',
             'username' => 'admin',
             'is_admin'=>'1',
             'is_atasan' => '0',
             'password'=> bcrypt('123456'),
          ],
          [
             'name'=>'User',
             'email'=>'user@itsolutionstuff.com',
             'telepon' => '0881036419106',
             'bagian' => 'pegawai',
             'alamat' => 'Mojokerto',
             'username' => 'user',
             'is_admin'=>'0',
             'is_atasan' => '0',
             'password'=> bcrypt('123456'),
          ],
          [
             'name'=>'Atasan',
             'email'=>'atasan@itsolutionstuff.com',
             'telepon' => '0881036419106',
             'bagian' => 'Pegawas',
             'alamat' => 'Mojokerto',
             'username' => 'admin',
             'is_admin'=>'0',
             'is_atasan' => '1',
             'password'=> bcrypt('123456'),
          ],
      ];

      foreach ($user as $key => $value) {
          User::create($value);
      }
    }
}
