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
          <li class=""><a href="/">Home</a></li>
          <li class=""><a href="{{ url('/admin/login') }}">Admin Login</a></li>
          @guest
              <li class="team-btn"><a href="{{route('login')}}">Login</a></li>
              <li class="buy-tickets"><a href="{{route('register')}}">Register</a></li>
              
          @elseif (Auth::guard('admin')->check()) 
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      <b>{{ Auth::user()->name }} <span class="caret"></span></b>
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
              </li>
          @endguest
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
</header>

@endsection


@section('page_content')
 <main id="main"  class="main-page">
    @yield('content')
</main>
  
<footer id="footer" class="fixed-bottom">
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