@section('sidenav')
     <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name  }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">menu</li>
        <!-- Optionally, you can add icons to the links -->
        @if(Auth::user()->admin)
        <li><a href="{{route('member.index')}}"><i class="fa fa-child"></i> <span>Member</span></a></li>
        @endif
       
          <li class="active"><a href="{{route('note.index')}}"><i class="fa fa-edit text-red"></i> <span>Notes</span></a></li>

          
        <li><a href="{{route('subject.index')}}"><i class="fa fa-laptop "></i> <span>Subject</span></a></li>
        <li><a href="{{route('faculty.index')}}"><i class="fa fa-laptop "></i> <span>faculty</span></a></li>

         <li class="treeview">
          <a href="#"><i class="fa fa-files-o text-green"></i> <span>News</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o text-green"></i>View News</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-green"></i>Create News</a></li>
          </ul>
        </li>
          <li class="treeview">
          <a href="#"><i class="fa fa-book text-blue"></i> <span>Articles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o text-blue"></i>View Articles</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-blue"></i>Create Article</a></li>
          </ul>
        </li>
        <li ><a href="#"><i class="fa fa-folder text-yellow"></i> <span>Movies</span></a></li>
        <li><a href="#"><i class="fa fa-laptop "></i> <span>Category</span></a></li>
        
        <li class="treeview">
          <a href="#"><i class="fa fa-th"></i> <span>Horoscope</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o text-blue"></i>Daily</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-blue"></i>Weekly</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-blue"></i>Monthly</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-blue"></i>Yearly</a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
    

@endsection