@section('footer')
	  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>
<script src="{{asset('back/assets/js/jquery-2.2.3.min.js')}}"></script>
<script src = "{{asset('datatable/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('back/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('back/assets/js/app.min.js')}}"></script>
@yield('flash')
@yield('js')
</body>
</html>

@endsection