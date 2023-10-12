@props(['listing'])
<x-card>
  <img src="{{ $listing->image ? asset('storage/' . $listing->image) : asset('images/default.jpg') }}"
    class="card-img-top" alt="Job Image">
  <div class="card-body">
    <h4 class="card-title">
      <a href="{{ route('listing.show', $listing->slug) }}" class="text-decoration-none">
        {{ $listing->title }}
      </a>
    </h4>
    <div class="card-text">
      <div>
        <span class="fs-5 fw-bold me-2">{{ $listing->company }}</span>
        {{ $listing->created_at->diffForHumans() }}
      </div>
      <h6 class="mt-3 mb-3">{{ $listing->location }}</h6>
    </div>
    <a href="{{ route('listing.show', $listing->slug) }}" class="text-decoration-none">
      Read More
    </a>
  </div>
</x-card>
