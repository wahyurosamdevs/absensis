@extends('layouts.admins.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <br>
        @if (session('status'))
            <div class="alert alert-warning">
                {{ session('status') }}
            </div>
        @endif
        <h1>Set Jadwal</h1>
        <form action="{{ route('jadwal.store') }}" method="post">
          @csrf
          <table class="table"  style="margin-top:10px">
            <tr>
              <th>Nama</th>
              <th>Masuk</th>
              <th>Tidak</th>
            </tr>
            @foreach ($user as $use)
              <tr>
                <input type="hidden" name="id_user[]" value="{{ $use->id }}">
                <td><label>{{ $use->name }}</label></td>
                <td><input type="checkbox" name="masuk[]" value="1" ></td>
                <td>
                  <input type="checkbox" name="masuk[]" value="0">
                </td>
              </tr>
            @endforeach
          </table>
          <div class="form-group">
           <label >Set Tanggal</label>
           <input type="date" name="tanggal" min="{{ Carbon\Carbon::now()->startOfWeek(Carbon\Carbon::MONDAY)->addDays(7)->format('Y-m-d')
           }}" max="{{ Carbon\Carbon::now()->endOfWeek(Carbon\Carbon::SATURDAY)->addDays(7)->format('Y-m-d')
            }}" value = "{{ Carbon\Carbon::now()->startOfWeek(Carbon\Carbon::MONDAY)->addDays(7)->format('Y-m-d')
             }}" class="form-control">
          </div>
          <div class="form-group">
            <label>Periode</label>
            <select class="form-control" name="periode">
              <option value="{{ $periode->id }}">{{ $periode->periode }}</option>
            </select>
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="5" class="form-control"></textarea>
          </div>
          <input type="submit" name="set" value="Set Jadwal"class="btn btn-success">
        </form>
      </div>
        <div class="col-sm-6" style="margin-top:10px">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Cek</th>
                <th>Detail</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($user as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->telepon }}</td>
                  <td>
                    {{-- <form action="{{ url('admin/home/jadwal/cek/'.$user->id) }}" method="post">
                      @csrf
                      <input type="submit" name="cek" value="Cek" class="btn btn-warning">
                    </form> --}}
                    <a href="{{ url('admin/home/jadwal/cek/'.$user->id) }}" class="btn btn-warning">Cek</a>
                  </td>
                  <td>
                    <form action="{{ url('admin/home/jadwal/detail/'.$user->id) }}" method="post">
                      @csrf
                      <input type="submit" name="cek" value="Jadwal" class="btn btn-success">
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
