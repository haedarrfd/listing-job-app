@extends('layouts.main')

@section('content')
  <x-flash-message />

  <h2 class="mt-4 mb-3 text-center">{{ $titlePage }}</h2>
  {{-- Search --}}

  {{-- Card Listing --}}
  <div class="row">
    @foreach ($listings as $listing)
      <div class="col-md-4">
        @if ($listings->count())
          <x-listing-content :listing="$listing" />
        @else
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>No Listing Job!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
      </div>
    @endforeach
  </div>
  {{-- End Card Listing --}}
@endsection
