@extends('layouts.pegawais.app')
@section('content')
<div class="container" >

    {{-- <h1>{{ $jadwal[0]->name }}</h1> --}}
  <div class="row" >
      <div class="col-sm-12" style="margin-top:10px">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>Tanggal</th>
              <th>Deskripsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($jadwal as $ss)
              <tr>
                 <td>{{ $ss->tanggal }}</td>
                 <td>{{ $ss->deskripsi }}</td>
               </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>

@endsection
