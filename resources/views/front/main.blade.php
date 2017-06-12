@include('front.includes.header') 
@include('front.includes.footer') 
@include('front.includes.sidebar') 

  @yield('header')
 <section id="newsSection">
    <div class="row">
     
        @yield('content')
        @yield('sidebar')
    </div>
  </section>
 
  @yield('footer')
  