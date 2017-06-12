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
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active"></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  <!-- <span class="btn-info">{{ $users->count() }}</span> -->
      @yield('content')
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @yield('footer')
@yield('js')

