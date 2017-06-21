@include('admin.layout.includes.header')
@include('admin.layout.includes.sidenav')
@section('title','Main')
@include('admin.layout.includes.footer')
      @yield('header')
      @yield('sidenav')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title')
      </h1>
     @yield('breadcrumb')
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('content')
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @yield('footer')

