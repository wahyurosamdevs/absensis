@extends('layouts.admins.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-sm-12" style="margin-top:10px">
        @if (session('status'))
            <div class="alert alert-warning">
                {{ session('status') }}
            </div>
        @endif
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th>Jadwal</th>
                <th>Pegawai</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($Absensi as $absen)
                <tr>
                  <td>{{ $absen->id_jadwal }}</td>
                  <td>{{ $absen->id_user }}</td>
                  <td>{{ $absen->verifikasi }}</td>
                  <td>
                    <form action="{{ url('admin/home/absensi/verifikasi/'.$absen->id) }}" method="get">
                      @csrf
                      <input type="submit" name="verifikasi" value="Verifikasi" class="btn btn-success">
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

    </div>
  </div>

@endsection
