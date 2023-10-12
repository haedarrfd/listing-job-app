@props(['listing'])
<x-card>
  <img src="{{ $listing->image ? asset('storage/' . $listing->image) : asset('images/default.jpg') }}"
    class="card-img-top" alt="Job Image" style="max-height: 380px;">
  <div class="card-body">
    <div class="card-title">
      <h4 class="fs-3 text-center my-2">{{ $listing->title }}</h4>
    </div>
    <div class="card-text">
      <p class="fw-semibold">Posted by : <span class="fw-bold">{{ $listing->user->name }}</span></p>
      <p class="fw-semibold">Category : <span class="fw-bold">{{ $listing->category->name }}</span></p>
      <p class="fw-semibold">Company : <span class="fw-bold">{{ $listing->company }}</span></p>
      <p class="fw-semibold">Location : <span class="fw-bold">{{ $listing->location }}</span></p>

      <h4 class="text-center mt-5 mb-3">Job Description</h4>
      <article>
        {!! $listing->description !!}
      </article>
    </div>
  </div>
</x-card>
