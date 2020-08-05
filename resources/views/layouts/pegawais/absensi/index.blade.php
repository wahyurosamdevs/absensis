@extends('layouts.pegawais.app')
@section('content')
<div class="container" >
  @if (session('success'))
      <div class="alert alert-warning">
          {{ session('success') }}
      </div>
  @endif
  <div class="row">
    <div class="col-sm-12">
      @if (count($jadwal) === 1)
        @if (count($absensi) === 1)
          <div class="alert alert-warning">
              Anda sudah absensi hari ini
          </div>
        @else
          <form action="{{ url('home/absensi/store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <br>
            <h1>Absensi</h1>
            <input type="hidden" name="id_user" value="{{ \Auth::id() }}">
            <input type="hidden" name="id_jadwal" value="{{ $jadwal[0]->id }}">
            <input type="hidden" name="id_setupjadwal" value="{{ $jadwal[0]->id_setupjadwal }}">
            <div class="form-group">
              <label>Foto</label>
              <input type="file" name="foto[]">
            </div>
            <div class="form-group">
              <label>Status</label>
              <select class="form-control" name="status">
                <option value="Masuk">Masuk</option>
                <option value="Sakit">Sakit</option>
              </select>
            </div>
            <input type="hidden" name="verifikasi" value="Wait">
            <input type="submit" name="save" value="Absensi" class="btn btn-success">
          </form>
        @endif
      @else
        <div class="alert alert-warning">
            Tidak ada dalam jadwal hari ini
        </div>
      @endif
    </div>
  </div>

</div>
@endsection
