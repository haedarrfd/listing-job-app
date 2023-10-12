@extends('layouts.dashboard.main')

@section('dashboard_content')
  <div class="row">
    <div class="col-10 mx-auto">
      <h4 class="text-center my-3">Edit Listing Job</h4>
    </div>

    <div class="col-10 mx-auto mb-5">
      <form action="{{ route('dashboard.listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control shadow-none @error('title') is-invalid @enderror" name="title"
            id="title" value="{{ old('title', $listing->title) }}" required autofocus>
          @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="company" class="form-label">Company</label>
          <input type="text" class="form-control shadow-none @error('company') is-invalid @enderror" name="company"
            id="company" value="{{ old('company', $listing->company) }}" required>
          @error('company')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="location" class="form-label">Location</label>
          <input type="text" class="form-control shadow-none @error('location') is-invalid @enderror" name="location"
            id="location" value="{{ old('location', $listing->location) }}" required>
          @error('location')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control shadow-none @error('email') is-invalid @enderror" name="email"
            id="email" value="{{ old('email', $listing->email) }}" required>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select class="form-select shadow-none @error('category_id') is-invalid @enderror" name="category_id" required>
            <option value="">--Select category--</option>
            @foreach ($categories as $category)
              @if (old('category_id', $listing->category->id) == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
              @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endif
            @endforeach
          </select>
          @error('category_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="hidden" name="oldImage" value="{{ $listing->image }}">
          @if ($listing->image)
            <img src="{{ asset('storage/' . $listing->image) }}" class="img-preview img-fluid mb-3 col-sm-6 d-block">
          @else
            <img class="img-preview img-fluid mb-3 col-sm-6">
          @endif
          <input class="form-control  @error('image') is-invalid @enderror" type="file" name="image" id="image"
            onchange="previewImage()">
          @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">description</label>
          @error('description')
            <p class="text-lead text-danger">
              {{ $message }}
            </p>
          @enderror
          <input type="hidden" name="description" id="description"
            value="{{ old('description', $listing->description) }}">
          <trix-editor input="description"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary">Update Listing</button>
        <a href="{{ route('dashboard.listings.index') }}" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>

  <script>
    // Preview Image
    function previewImage() {
      const image = document.querySelector('#image')
      const imgPreview = document.querySelector('.img-preview')

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0])
      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
  </script>
@endsection
