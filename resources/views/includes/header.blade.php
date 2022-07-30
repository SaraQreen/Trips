<!-- Vendor CSS Files -->
<link href=" {{URL::asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
<link href=" {{URL::asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
<link href=" {{URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href=" {{URL::asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
<link href=" {{URL::asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
<link href=" {{URL::asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
<link href=" {{URL::asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

<!-- Bootstrap css files -->
<link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.css')}}">

<!-- Template Main CSS File -->
<link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">

@if (Request()->is('home'))
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
  @else
  <header id="header" class="fixed-top d-flex align-items-center header-scrolled">
    @endif
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="{{ url('/home') }}"><img src="/assets/img/logo_transperent.png" data-aos="fade-right" alt="" class="img-fluid"><span>RideShare</span></a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="{{ (request()->is('home')) ? 'active' : '' }}" href="{{ url('/home') }}">Home</a></li>
          <li><a class="{{ (request()->is('about')) ? 'active' : '' }}" href="{{ url('/about') }}">About</a></li>
          <li><a class="{{ (request()->is('services')) ? 'active' : '' }}" href="{{ url('/services') }}">Services</a></li>
          <li><a class="{{ (request()->is('contact')) ? 'active' : '' }}" href="{{ url('/contact') }}">Contact Us</a></li>
          @auth
          @if(Auth::user()->role_type=='USER')
          <li> <a href="{{ route('trips') }}" class="{{ (request()->is('Trips')) ? 'active' : '' }}">Trips</a></li>
          @else
          <li> <a href="{{ route('trips_driver') }}" class="{{ (request()->is('Trips_driver')) ? 'active' : '' }}">Trips</a></li>
          @endif

          @else
          <li> <a href="{{ route('login') }}" class="btn-account {{ (request()->is('login')) ? 'd-none' : '' }}">Login</a></li>

          @if (Route::has('register'))
          <li> <a href="{{ route('register') }}" class="btn-account {{ (request()->is('register')) ? 'd-none' : '' }}">Register</a></li>
          @endif
          @endauth
        </ul>

        @auth
        <div class="dropdown">
          <img src="{{URL::asset('assets/img/notifications2.svg')}}" class=" dropdown-toggle  nav_icon" data-toggle="dropdown" role="button" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false" alt="">
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>

        <div class="dropdown">
          <img src="{{URL::asset('assets/img/account.svg')}}" class="dropdown-toggle nav_icon" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" alt="">

          <div class="dropdown-menu">
            @if(Auth::user()->role_type=='USER')
            <a class="dropdown-item" href="{{route('my_profile')}}">My Profile</a>
            @else
            <a class="dropdown-item" href="{{route('my_profile_driver')}}">My Profile</a>
            @endif

            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              {{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>

          </div>
        </div>
        @endauth

        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->