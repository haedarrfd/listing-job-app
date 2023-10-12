@extends('layouts.dashboard.main')

@section('dashboard_content')
  <div class="row mb-2">
    <div class="col-sm-8">
      <h1 class="m-0 text-dark">Selamat Datang di Halaman Dashboard JobList!</h1>
    </div><!-- /.col -->
    <div class="col-sm-4">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection
