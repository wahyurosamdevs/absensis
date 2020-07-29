<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  public function indexAdmin(){
    $user = Users::all()->where('is_admin','1');
    return view('layouts.admins.user.admin.index',compact('user'));
  }

  public function createAdmin()
  {
    return view('layouts.admins.user.admin.create');
  }
  public function storeAdmin(Request $request){
    Users::create([
        'name' => $request->input('nama'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'telepon' => $request->input('telepon'),
        'bagian' => $request->input('bagian'),
        'alamat' => $request->input('alamat'),
        'username' => $request->input('username'),
        'is_admin' => $request->input('is_admin'),
        'is_atasan' => '0',
    ]);
    return redirect('admin/home/admin/');
  }
  public function editAdmin($id)
  {
    $users = Users::all()->where('id',$id);
    return view('layouts.admins.user.admin.edit',compact('users'));
  }
  public function updateAdmin(Request $request)
  {
    $users = Users::where('id',$request->id)->update(
      [
        'name' => $request->input('nama'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'telepon' => $request->input('telepon'),
        'bagian' => $request->input('bagian'),
        'alamat' => $request->input('alamat'),
        'username' => $request->input('username'),
        'is_admin' => $request->input('is_admin'),
        'is_atasan' => '0',
      ]
    );
    return redirect('admin/home/admin/');
  }
  public function deleteAdmin($id){
    $users = Users::find($id);
    $users->delete();
    return redirect('admin/home/admin/');
  }


  public function indexAtasan(){
    $user = Users::all()->where('is_atasan','1');
    return view('layouts.admins.user.atasan.index',compact('user'));
  }

  public function createAtasan()
  {
    return view('layouts.admins.user.atasan.create');
  }
  public function storeAtasan(Request $request){
    Users::create([
        'name' => $request->input('nama'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'telepon' => $request->input('telepon'),
        'bagian' => $request->input('bagian'),
        'alamat' => $request->input('alamat'),
        'username' => $request->input('username'),
        'is_atasan' => $request->input('is_atasan'),
        'is_admin' => '0',
    ]);
    return redirect('admin/home/atasan/');
  }
  public function editAtasan($id)
  {
    $users = Users::all()->where('id',$id);
    return view('layouts.admins.user.atasan.edit',compact('users'));
  }
  public function updateAtasan(Request $request)
  {
    $users = Users::where('id',$request->id)->update(
      [
        'name' => $request->input('nama'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'telepon' => $request->input('telepon'),
        'bagian' => $request->input('bagian'),
        'alamat' => $request->input('alamat'),
        'username' => $request->input('username'),
        'is_atasan' => $request->input('is_atasan'),
        'is_admin' => '0',
      ]
    );
    return redirect('admin/home/atasan/');
  }
  public function deleteAtasan($id){
    $users = Users::find($id);
    $users->delete();
    return redirect('admin/home/atasan/');
  }
  public function indexPegawai(){
    $user = Users::all()->where('is_admin','0')->where('is_atasan','0');
    return view('layouts.admins.user.pegawai.index',compact('user'));
  }

  public function createPegawai()
  {
    return view('layouts.admins.user.pegawai.create');
  }
  public function storePegawai(Request $request){
    Users::create([
        'name' => $request->input('nama'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'telepon' => $request->input('telepon'),
        'bagian' => $request->input('bagian'),
        'alamat' => $request->input('alamat'),
        'username' => $request->input('username'),
        'is_admin' => '0',
        'is_atasan' => '0',
    ]);
    return redirect('admin/home/pegawai/');
  }
  public function editPegawai($id)
  {
    $users = Users::all()->where('id',$id);
    return view('layouts.admins.user.pegawai.edit',compact('users'));
  }
  public function updatePegawai(Request $request)
  {
    $users = Users::where('id',$request->id)->update(
      [
        'name' => $request->input('nama'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'telepon' => $request->input('telepon'),
        'bagian' => $request->input('bagian'),
        'alamat' => $request->input('alamat'),
        'username' => $request->input('username'),
        'is_admin' => '0',
        'is_atasan' => '0',
      ]
    );
    return redirect('admin/home/pegawai/');
  }
  public function deletePegawai($id){
    $users = Users::find($id);
    $users->delete();
    return redirect('admin/home/pegawai/');
  }
}
