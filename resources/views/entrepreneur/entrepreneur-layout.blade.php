@extends('layout')

@section('stylesheets')
  <link href="{{ asset('css/custom-css.css') }}" rel="stylesheet">
@endsection

@section('page_header')
<header id="header" class="header-fixed">

    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
        <a href="/" class="scrollto"><img src="{{ asset('img/logo.png') }}" alt="E-Cell AIT" title="E-Cell AIT"></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="/">Home</a></li>
          <li><a href="#">Upcoming Events</a></li>
          <li><a href="/#speakers">Participations</a></li>
          
          <li class="dropdown header-dropdown">
            <a role="button" href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              Our Initiatives
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Link 1</a>
              <a class="dropdown-item" href="#">Link 2</a>
            </div>
          </li>
          

          @if (Auth::guard('entrepreneur')->check()) 
              <li><a href="#gallery">Your Profile</a></li>
              <li class="dropdown header-dropdown">
                <a role="button" href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <b>{{ Auth::guard('entrepreneur')->user()->name }}</b>
                </a>
                <div class="dropdown-menu">
                 
                  <a class="dropdown-item" href="{{ url('/entrepreneur/logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                  </a>
                   <a class="dropdown-item" href="{{ url('/entrepreneur/password/reset') }}">Password Reset</a>
                  
                  <form id="logout-form" action="{{ url('/entrepreneur/logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                </div>
              </li>
          @else
              <li><a href="{{ route('Login')}}">Login</a></li>
              {{-- Conventional Drop down --}}
              {{-- <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" v-pre>
                      <b>{{ Auth::user()->email }}</b>
                  </a>

                  <ul class="dropdown-content">
                    <li><a href="#" class="" href="#">Profile </a></li>
                    <li><a href="#" class="" href="#">Password Reset</a></li>
                    <li><a class="" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>

                  </ul>
              </li> --}}
          @endif
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
</header>

@endsection


@section('page_content')
 <main id="main"  class="main-page">

    @if (session('status'))
        <div class="text-center alert alert-warning">
            {{ session('status') }}
        </div>
    @endif

    @yield('content')
</main>
  
<footer id="footer">
  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong>AIT ENTREPRENEURSHIP CELL</strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
      -->
      Designed by <a href="https://www.facebook.com/engineerdk.ait/">Web Team, E-Cell AIT</a>
    </div>
  </div>
</footer><!-- #footer -->
  
@endsection