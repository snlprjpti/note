@section('header')
<html>
<head>
<title>Notes</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/font.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/li-scroller.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/jquery.fancybox.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/theme.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/style.css')}}">

</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <section>
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="index.html"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
          <li><a href="#">Technology</a></li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mobile</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Android</a></li>
              <li><a href="#">Samsung</a></li>
              <li><a href="#">Nokia</a></li>
              <li><a href="#">Walton Mobile</a></li>
              <li><a href="#">Sympony</a></li>
            </ul>
          </li>
          <li><a href="#">Laptops</a></li>
          <li><a href="#">Tablets</a></li>
          <li><a href="pages/contact.html">Contact Us</a></li>
          <li><a href="pages/404.html">404 Page</a></li>
        </ul>
      </div>
    </nav>
  </section>
 

@endsection