@extends('layouts.dashboard.main')

@section('dashboard_content')
  <div class="row">
    <div class="col-md-8 mx-auto">
      <x-single-listing :listing="$listing" />

      <a href="{{ route('dashboard.listings.index') }}" class="btn btn-secondary my-4">
        Kembali
      </a>
    </div>
  </div>
@endsection
