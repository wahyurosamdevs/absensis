@extends('layouts.admins.app')
@section('content')

<div class="container" >
  <h3>Edit Admin</h3>
  <div class="row" >
    <form action="{{ route('admin.update') }}" method="post">
      @csrf
      @foreach ($users as $user)
        <div class="col-sm-12" style="margin-top:10px;margin-bottom:10px">
          <div class="form-group">
            <input type="hidden" name="id" value="{{ $user->id  }}">
          </div>
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="nama" class="form-control" value="{{ $user->name  }}">
          </div>
          <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ $user->telepon }}">
          </div>
          <div class="form-group">
            <label>Bagian</label>
            <input type="text" name="bagian" class="form-control" value="{{ $user->bagian }}">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $user->alamat }}">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
          </div>
          <div class="form-group">
            <input type="hidden" name="is_admin" class="form-control" value="1" value="{{ $user->is_admin }}">
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="{{ $user->username }}">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control" value="">
          </div>
          <input type="submit" name="save" value="save" class="btn btn-success">
          <a href="{{ route('admin.index') }}" class="btn btn-danger">Back</a>
        </div>
      @endforeach
    </form>
  </div>
</div>

@endsection
