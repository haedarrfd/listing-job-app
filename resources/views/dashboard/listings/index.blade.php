@php
  $no = 1;
@endphp

@extends('layouts.dashboard.main')

@section('dashboard_content')
  <x-flash-message />

  <div class="row mt-2">
    <div class="col-4">
      <a href="{{ route('dashboard.listings.create') }}" class="btn btn-primary my-3">
        Create New Listing
      </a>
    </div>
    <div class="col-12">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Title</th>
            <th scope="col">Company</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if ($listings->count())
            @foreach ($listings as $listing)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $listing->title }}</td>
                <td>{{ $listing->company }}</td>
                <td>{{ $listing->category->name }}</td>
                <td>
                  <a href="{{ route('dashboard.listings.show', $listing->slug) }}" class="btn btn-info">
                    Detail
                  </a>
                  <a href="{{ route('dashboard.listings.edit', $listing->slug) }}" class="btn btn-warning">
                    Edit
                  </a>
                  <form action="/dashboard/listings/{{ $listing->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                      Delete
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          @else
            <td colspan="5">No Listing Found!</td>
          @endif
        </tbody>
      </table>
    </div>
  </div>
@endsection
