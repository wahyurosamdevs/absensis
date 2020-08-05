<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Users;
use Illuminate\Http\Request;
use App\Jadwal;
use App\SetupJadwal;
use DB;
class JadwalController extends Controller
{
    public function indexSetJadwal(){
      $id = Auth::id();
      $user = Users::where('id',$id)->get();
      if ($user[0]->is_admin == '1'){
        $periode = SetupJadwal::latest()->first();
        $user = Users::all()->where('is_admin','0')->where('is_atasan','0');
        return view('layouts.admins.jadwal.index')->with(['user' => $user, 'periode' => $periode]);
      }elseif ($user[0]->is_atasan == '1') {
        $periode = SetupJadwal::latest()->first();
        $user = Users::all()->where('is_admin','0')->where('is_atasan','0');
        return view('layouts.admins.jadwal.index')->with(['user' => $user, 'periode' => $periode]);
      }

    }
    public function storeJadwal(Request $request){
      $s=$request->masuk;
      $user=$request->id_user;
      $count = count($user);
      $setjadwal=[];
      for ($i=0; $i < $count; $i++) {
        if ($request->masuk[$i] == '1') {
          $setjadwal[]=[
              'tanggal' => $request->tanggal,
              'id_user' => $request->id_user[$i],
              'id_setupjadwal' => $request->periode,
              'deskripsi' => $request->deskripsi,
          ];
        }
      }
      $usercounts=$count / 2;
      $jadwalnum =count($setjadwal);
      $id = Auth::id();
      $user = Users::where('id',$id)->get();

      if ($user[0]->is_admin == '1'){
        if (Jadwal::where('tanggal',$request->tanggal)->exists()) {
            return redirect('admin/home/jadwal')->with('status', 'Tanggal Sudah di Set ');
        }else{
          if ($jadwalnum <= $usercounts) {
            Jadwal::insert($setjadwal);
            return redirect('admin/home/jadwal')->with('status', 'Berhasil');
          }else{
            return redirect('admin/home/jadwal')->with('status', 'Melebihi 50% Pegawai');
          }
        }
      }elseif ($user[0]->is_atasan == '1') {
        if (Jadwal::where('tanggal',$request->tanggal)->exists()) {
            return redirect('atasan/home/jadwal')->with('status', 'Tanggal Sudah di Set ');
        }else{
          if ($jadwalnum <= $usercounts) {
            Jadwal::insert($setjadwal);
            return redirect('atasan/home/jadwal')->with('status', 'Berhasil');
          }else{
            return redirect('atasan/home/jadwal')->with('status', 'Melebihi 50% Pegawai');
          }
        }
      }

    }
    public function cek($id){
      $jadwal=DB::table('jadwals')
            ->where('id_user',$id)
            ->where('id_setupjadwal',SetupJadwal::latest()->first()->id)
            ->join('users','users.id','=','jadwals.id_user')
            ->select('users.name','jadwals.tanggal','jadwals.deskripsi')
            ->get();
      $jadwalscount=count($jadwal);
      // echo SetupJadwal::latest()->first()->id;
      if ($jadwalscount > 0) {
        $name=$jadwal[0]->name;
        $id = Auth::id();
        $user = Users::where('id',$id)->get();
        if ($user[0]->is_admin == '1'){
          if ($jadwalscount < 3) {
            return redirect('admin/home/jadwal')->with('status', 'nama pegawai '.$name.' belum dijadwalkan minimal 3 kali dalam seminggu');
          }else{
            return redirect('admin/home/jadwal')->with('status', 'nama pegawai '.$name.' telah dijadwal minimal  3 kali seminggu');
          }
        }elseif ($user[0]->is_atasan == '1') {
          if ($jadwalscount < 3) {
            return redirect('atasan/home/jadwal')->with('status', 'nama pegawai '.$name.' belum dijadwalkan minimal 3 kali dalam seminggu');
          }else{
            return redirect('atasan/home/jadwal')->with('status', 'nama pegawai '.$name.' telah dijadwal minimal  3 kali seminggu');
          }
        }
      } else {
          return redirect('atasan/home/jadwal')->with('status', 'belum ada jadwal');
      }



    }
    public function jadwaluser($id){
        $jadwal=DB::table('jadwals')
              ->where('id_user',$id)
              ->where('id_setupjadwal',SetupJadwal::latest()->first()->id)
              ->join('users','users.id','=','jadwals.id_user')
              ->select('users.name','jadwals.tanggal','jadwals.deskripsi')
              ->get();

        $id = Auth::id();
        $user = Users::where('id',$id)->get();
        // echo $user[0]->level;
        if ($user[0]->is_admin == '1') {
          if ($jadwal == null) {
            return view('layouts.admins.jadwal.manage.detail');
          } else {
            return view('layouts.admins.jadwal.manage.detail',compact('jadwal'));
          }
        }elseif($user[0]->is_atasan == '1'){
          if ($jadwal == null) {
            return view('layouts.atasans.jadwal.manage.detail');
          } else {
            return view('layouts.atasans.jadwal.manage.detail',compact('jadwal'));
          }
        }else{
          if ($jadwal == null) {
            return view('layouts.pegawais.jadwal.index');
          } else {
            return view('layouts.pegawais.jadwal.index',compact('jadwal'));
          }
        }
    }
}
