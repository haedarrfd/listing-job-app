@extends('layouts.main')

@section('content')
  <h2 class="text-center mt-4 mb-4">Listing Categories</h2>

  <div class="container">
    <div class="row">
      @foreach ($categories as $category)
        <div class="col-md-4">
          <a href="{{ route('home') }}">
            <x-card class="bg-dark text-white">
              <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img"
                alt="{{ $category->name }}">
              <div class="card-img-overlay d-flex align-items-center p-0">
                <h5 class="card-title text-center p-3 fs-4 flex-fill" style="background-color: rgba(0, 0, 0, .5)">
                  {{ $category->name }}</h5>
              </div>
            </x-card>
          </a>
        </div>
      @endforeach
    </div>
  </div>
@endsection
