@extends('layouts.main')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-5">

      <x-flash-message />

      @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>{{ session('loginError') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <main class="form-signin w-100 m-auto">
        <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
        <form action="{{ route('login.auth') }}" method="POST">
          @csrf
          <div class="form-floating d-block mb-3">
            <input type="email" class="form-control shadow-none @error('email') is-invalid @enderror" name="email"
              id="email" placeholder="email" value="{{ old('email') }}" autofocus required>
            <label for="email">Email address</label>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating d-block mb-3">
            <input type="password" class="form-control shadow-none @error('password') is-invalid @enderror"
              name="password" id="password" placeholder="Password" required>
            <label for="password">Password</label>
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Login</button>
        </form>
        <small class="d-block mt-2 text-center">
          Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">Register</a>
        </small>
      </main>
    </div>
  </div>
@endsection
