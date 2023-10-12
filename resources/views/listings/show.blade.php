@extends('layouts.main')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <x-single-listing :listing="$listing" />

        <a href="{{ route('home') }}" class="btn btn-secondary mt-4 mb-5">Kembali</a>
      </div>
    </div>
  </div>
@endsection
