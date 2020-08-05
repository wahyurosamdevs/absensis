@extends('layouts.admins.app')
@section('content')

<div class="container" >
  <h3>Create Periode</h3>
  <div class="row" >
    <div class="col-sm-12" style="margin-top:10px">

    <form action="{{ route('setupjadwal.store') }}" method="post">
      @csrf
        <div class="form-group">
          <label>Periode</label>
          <input type="text" name="periode" class="form-control">
        </div>
        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" name="tanggal" class="form-control">
        </div>
        <input type="submit" name="Save" value="Save" class="btn btn-success">
    </form>
    </div>
  </div>
</div>
@endsection
