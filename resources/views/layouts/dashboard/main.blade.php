{{-- Header --}}
@include('layouts.dashboard.header')
{{-- Navbar --}}
@include('layouts.dashboard.navbar')
{{-- Sidebar --}}
@include('layouts.dashboard.sidebar')


<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      @yield('dashboard_content')
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

{{-- Footer --}}
@include('layouts.dashboard.footer')
