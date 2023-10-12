<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Job Listing App - {{ $title }}</title>
</head>

<body>
  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">JobList</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ $title === 'Main Page' ? 'active' : '' }}" aria-current="page"
              href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $title === 'Categories' ? 'active' : '' }}"
              href="{{ route('categories') }}">Categories</a>
          </li>
        </ul>
        @auth
          <div class="btn-group ms-auto" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle shadow-sm"
              data-bs-toggle="dropdown" aria-expanded="false">
              Welcome, {{ auth()->user()->name }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
              <li>
                <a class="dropdown-item" href="{{ route('dashboard') }}">
                  Dashboard
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">
                    Logout
                  </button>
                </form>
              </li>
            </ul>
          </div>
        @else
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="/login" class="btn btn-warning text-dark">
                Login
              </a>
            </li>
          </ul>
        @endauth

      </div>
    </div>
  </nav>
  {{-- End Navbar --}}

  <div class="container mt-4">
    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
