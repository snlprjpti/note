@include('admin.layout.includes.header')
@include('admin.layout.includes.sidenav')
@include('admin.layout.includes.footer')
      @yield('header')
      @yield('sidenav')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
    </section>

   <section class="content">
		<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total users</span>
              <span class="info-box-number">{{ $users->count() }}</span>
            </div>
          </div>
        </div>
        <a href="{{route('note.index')}}">
 		<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Notes</span>
              <span class="info-box-number">{{$notes->count()}}</span>
            </div>
           
          </div>
        </div>
        </a>
    </section>
  </div>

  @yield('footer')


