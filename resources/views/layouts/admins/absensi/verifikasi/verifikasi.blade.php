@extends('layouts.admins.app')
@section('content')

<div class="container" >
  <h3>Verifikasi data</h3>
  <div class="row" >
    <form action="{{ url('admin/home/absensi/verifikasidata/'.$Absensi[0]->id) }}" method="post">
      @csrf
      <div class="col-sm-12" style="margin-top:10px">
        @foreach ($Absensi as $Absen)
          <div class="form-group">
            <label>Pegawai : </label>
            <label>{{ $Absen->id_user }}</label>
          </div>
          <div class="form-group">
            <label>Foto : </label>
            <img src="{{ asset('/foto/'.$Absen->foto) }}" height="400">
          </div>
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status">
              <option value="Masuk">Masuk</option>
              <option value="Sakit">Sakit</option>
              <option value="Alpha">Alpha</option>
            </select>
          </div>
        @endforeach
        <input type="submit" name="save" value="Verifikasi" class="btn btn-success">
      </div>
    </form>
  </div>
</div>

@endsection
