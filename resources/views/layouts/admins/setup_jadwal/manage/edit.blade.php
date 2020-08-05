@extends('layouts.admins.app')
@section('content')

<div class="container" >
  <h3>Create Periode</h3>
  <div class="row" >
    <div class="col-sm-12" style="margin-top:10px">
    @foreach ($setupjadwal as $sj)
      <form action="{{ route('setupjadwal.update') }}" method="post">
        @csrf
          <input type="hidden" name="id" value="{{ $sj->id }}">
          <div class="form-group">
            <label>Periode</label>
            <input type="text" name="periode" class="form-control" value="{{ $sj->periode }}">
          </div>
          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $sj->tanggal_awal }}">
          </div>
          <input type="submit" name="Save" value="Edit" class="btn btn-success">
          <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
      </form>
    @endforeach
    </div>
  </div>
</div>
@endsection
