@extends('layouts.admins.app')
@section('content')
<div class="container" >
  <h1>Manage Atasan</h1>
  <div class="row" >
      <div class="col-sm-12" style="margin-top:10px">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Telepon</th>
              <th>Email</th>
              <th>Action</th>
              <th>Detail</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->telepon }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  <a href="{{ url('/admin/home/atasan/edit/'.$user->id) }}" class="btn btn-warning">Edit</a>

                  <form action="{{ url('/admin/home/atasan/delete/'.$user->id) }}" method="post">
                      @csrf
                      <input type="submit" name="delete" value="delete" class="btn btn-danger">
                  </form>

                </td>
                <td>
                  <a href="" class="btn btn-primary">Detail</a>
                </td>
              </tr>
            @endforeach

          </tbody>
        </table>
      <a href="{{ route('atasan.create') }}" class="btn btn-success">Add</a>
      </div>

  </div>
</div>

@endsection
