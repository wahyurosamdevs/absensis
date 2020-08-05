<?php

namespace App\Http\Controllers;

use App\SetupJadwal;
use Illuminate\Http\Request;
use Validator;
class SetupJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setupjadwal = SetupJadwal::paginate(5);
        return view('layouts.admins.setup_jadwal.index',compact('setupjadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admins.setup_jadwal.manage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'periode' => 'required',
          'tanggal' => 'required',
        ]);
        $save_periode = SetupJadwal::create([
          'periode' => $request->input('periode'),
          'tanggal_awal' => $request->input('tanggal'),
        ]);
        return redirect()->route('setupjadwal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SetupJadwal  $setupJadwal
     * @return \Illuminate\Http\Response
     */
    public function show(SetupJadwal $setupJadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SetupJadwal  $setupJadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(SetupJadwal $setupJadwal,$id)
    {
        $setupjadwal = SetupJadwal::where('id',$id)->get();
        return view('layouts.admins.setup_jadwal.manage.edit',compact('setupjadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SetupJadwal  $setupJadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SetupJadwal $setupJadwal)
    {
      $request->validate([
        'periode' => 'required',
        'tanggal' => 'required',
      ]);
      $save_periode = SetupJadwal::where('id',$request->id)->update([
        'periode' => $request->input('periode'),
        'tanggal_awal' => $request->input('tanggal'),
      ]);
      return redirect()->route('setupjadwal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SetupJadwal  $setupJadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(SetupJadwal $setupJadwal,$id)
    {
        $delete = SetupJadwal::where('id',$id)->delete();
        return redirect()->route('setupjadwal.index');
    }
}
