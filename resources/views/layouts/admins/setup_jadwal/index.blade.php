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
                <th>#</th>
                <th>Periode</th>
                <th>Tanggal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($setupjadwal as $sj)
                <tr>
                  <td>{{ $sj->id }}</td>
                  <td>{{ $sj->periode }}</td>
                  <td>{{ $sj->tanggal_awal }}</td>
                  <td>
                    <a href="{{ url('/admin/home/periode/edit/'.$sj->id) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ url('/admin/home/periode/delete/'.$sj->id) }}" method="post">
                        @csrf
                        <input type="submit" name="delete" value="delete" class="btn btn-danger">
                    </form>

                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{ $setupjadwal->links() }}
          <a href="{{ route('setupjadwal.create') }}" class="btn btn-success">Add</a>
        </div>

    </div>
  </div>

@endsection
