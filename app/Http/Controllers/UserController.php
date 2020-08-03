<?php

namespace App\Http\Controllers;

use App\Users;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  public function indexAdmin(){
    $user = User::all()->where('is_admin','1');
    return view('layouts.admins.user.admin.index',compact('user'));
  }

  public function createAdmin()
  {
    return view('layouts.admins.user.admin.create');
  }
  public function storeAdmin(Request $request){
    User::create([
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
    $users = User::all()->where('id',$id);
    return view('layouts.admins.user.admin.edit',compact('users'));
  }
  public function updateAdmin(Request $request)
  {
    $users = User::where('id',$request->id)->update(
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
    $users = User::find($id);
    $users->delete();
    return redirect('admin/home/admin/');
  }


  public function indexAtasan(){
    $user = User::all()->where('is_atasan','1');
    return view('layouts.admins.user.atasan.index',compact('user'));
  }

  public function createAtasan()
  {
    return view('layouts.admins.user.atasan.create');
  }
  public function storeAtasan(Request $request){
    User::create([
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
    $users = User::all()->where('id',$id);
    return view('layouts.admins.user.atasan.edit',compact('users'));
  }
  public function updateAtasan(Request $request)
  {
    $users = User::where('id',$request->id)->update(
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
    $users = User::find($id);
    $users->delete();
    return redirect('admin/home/atasan/');
  }
  public function indexPegawai(){
    $user = User::all()->where('is_admin','0')->where('is_atasan','0');
    return view('layouts.admins.user.pegawai.index',compact('user'));
  }

  public function createPegawai()
  {
    return view('layouts.admins.user.pegawai.create');
  }
  public function storePegawai(Request $request){
    User::create([
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
    $users = User::all()->where('id',$id);
    return view('layouts.admins.user.pegawai.edit',compact('users'));
  }
  public function updatePegawai(Request $request)
  {
    $users = User::where('id',$request->id)->update(
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
    $users = User::find($id);
    $users->delete();
    return redirect('admin/home/pegawai/');
  }
}
