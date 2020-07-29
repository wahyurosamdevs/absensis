<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Jadwal;
use App\Absensi;
use Carbon\Carbon;
use DB;
class AbsensiController extends Controller
{
    public function index($id){
      $id = Auth::id();
      $jadwal = Jadwal::where('id_user',$id)->where('tanggal',Carbon::parse('2020-08-03')->format('Y-m-d'))->get();
      $absensi = Absensi::where('id_user',$id)->where('id_jadwal',$jadwal[0]->id)->get();
      if (count($jadwal) == '1') {
        if (count($absensi) == '1') {
          return view('layouts.pegawais.absensi.index',compact('absensi','jadwal'));
        }else {
          return view('layouts.pegawais.absensi.index',compact('jadwal'));
        }

      }else{
        return view('layouts.pegawais.absensi.index',compact('jadwal'));
      }
    }
    public function store(Request $request){

      if ($request->hasFile('foto')) {
        foreach ($request->file('foto') as $image) {
          $name=$image->getClientOriginalName();
          $image->move(public_path().'/foto/',$name);
          $data[] =$name;
        }
      }
      $Absensi = new Absensi;
      $Absensi->id_user=$request->id_user;
      $Absensi->id_jadwal=$request->id_jadwal;
      $Absensi->foto=$data;
      $Absensi->verifikasi=$request->verifikasi;
      $Absensi->status=$request->status;
      $Absensi->save();
      return back()->with('success', 'Berhasil Absensi Hari ini');
    }
    public function verifikasi(){
      $Absensi = Absensi::all()->where('verifikasi','Wait');
      return view('layouts.admins.absensi.index',compact('Absensi'));
    }
    public function detailverifikasi($id){
      $Absensi = Absensi::all()->where('id',$id);
      return view('layouts.admins.absensi.verifikasi.verifikasi',compact('Absensi'));
    }
    public function actionverifikasi($id,Request $request){
      echo $request->status;
      DB::table('absensi')->where('id',$id)->update(['status' => $request->status,'verifikasi' => 'Verifikasi']);
      return redirect()->route('verifikasi.admin')->with('status', 'berhasil verifikasi');
    }
}
