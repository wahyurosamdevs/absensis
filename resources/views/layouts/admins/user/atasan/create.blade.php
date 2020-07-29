@extends('layouts.admins.app')
@section('content')

<div class="container" >
  <h3>Create Atasan</h3>
  <div class="row" >
    <form action="{{ route('atasan.store') }}" method="post">
      @csrf
      <div class="col-sm-12" style="margin-top:10px">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
          <label>Telepon</label>
          <input type="text" name="telepon" class="form-control">
        </div>
        <div class="form-group">
          <label>Bagian</label>
          <input type="text" name="bagian" class="form-control">
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input type="text" name="alamat" class="form-control">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
          <input type="hidden" name="is_atasan" class="form-control" value="1">
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="text" name="password" class="form-control">
        </div>
        <input type="submit" name="save" value="save" class="btn btn-success">
      </div>

    </form>
  </div>
</div>

@endsection
