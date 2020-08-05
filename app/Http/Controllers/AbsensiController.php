<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Jadwal;
use App\Absensi;
use App\User;
use Carbon\Carbon;
use DB;
Use Redirect;
class AbsensiController extends Controller
{
    public function index($id){
      $id = Auth::id();
      $jadwal = Jadwal::where('id_user',$id)->where('tanggal',Carbon::parse('2020-08-10')->format('Y-m-d'))->get();
      if (count($jadwal) == '1') {
        $absensi = Absensi::where('id_user',$id)->where('id_jadwal',$jadwal[0]->id)->get();
        if (count($absensi) == '1') {
          return view('layouts.pegawais.absensi.index',compact('absensi','jadwal'));
        }else {
          return view('layouts.pegawais.absensi.index',compact('jadwal','absensi'));
        }
      }elseif($jadwal ){
        return \Redirect::back();
      }
    }
    public function store(Request $request){
      if ($request->hasFile('foto')) {
        foreach ($request->file('foto') as $image) {
          $name=$image->getClientOriginalName();
          $image->move(public_path().'/foto/',$name);
          $data=$name;
        }
      }
      $Absensi = new Absensi;
      $Absensi->id_user=$request->id_user;
      $Absensi->id_jadwal=$request->id_jadwal;
      $Absensi->foto=$data;
      $Absensi->id_setupjadwal=$request->id_setupjadwal;
      $Absensi->verifikasi=$request->verifikasi;
      $Absensi->status=$request->status;
      $Absensi->save();
      return back()->with('success', 'Berhasil Absensi Hari ini');
    }
    public function verifikasi(){
      $Absensi = Absensi::with('user')->with('jadwal')->where('verifikasi','Wait')->get();
      // $Absensi = User::all();
      // return response()->json($Absensi);

      return view('layouts.admins.absensi.index',compact('Absensi'));
    }
    public function detailverifikasi($id){
      $Absensi = Absensi::with('user')->where('id',$id)->get();
      return view('layouts.admins.absensi.verifikasi.verifikasi',compact('Absensi'));
    }
    public function actionverifikasi($id,Request $request){
      echo $request->status;
      DB::table('absensi')->where('id',$id)->update(['status' => $request->status,'verifikasi' => 'Verifikasi']);
      return redirect()->route('verifikasi.admin')->with('status', 'berhasil verifikasi');
    }
}
