@extends('layouts.main')

@section('content')
  <div class="row justify-content-center">
    <div class="col-sm-10 col-md-8 col-lg-5">
      <main class="form-registration w-100 m-auto">
        <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
        <form action="{{ route('register.store') }}" method="POST">
          @csrf
          <div class="form-floating d-block mb-3">
            <input type="text" class="form-control shadow-none @error('name') is-invalid @enderror" name="name"
              id="name" placeholder="name" value="{{ old('name') }}" required>
            <label for="name">Name</label>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating d-block mb-3">
            <input type="text" class="form-control shadow-none @error('username') is-invalid @enderror" name="username"
              id="username" placeholder="username" value="{{ old('username') }}" required>
            <label for="username">Username</label>
            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating d-block mb-3">
            <input type="email" class="form-control shadow-none @error('email') is-invalid @enderror" name="email"
              id="email" placeholder="email" value="{{ old('email') }}" required>
            <label for="email">Email</label>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating d-block mb-3">
            <input type="password" class="form-control shadow-none @error('password') is-invalid @enderror"
              name="password" id="password" placeholder="password" required>
            <label for="password">Password</label>
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
        </form>
        <small class="d-block mt-2 text-center">
          Already have an account? <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
        </small>
      </main>
    </div>
  </div>
@endsection
