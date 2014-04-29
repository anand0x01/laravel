<div class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ URL::route('home') }}">SenseiHub</a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
      <ul class="nav navbar-nav">
        @if(Auth::check())
        <li class=""><a href="{{ URL::route('ads') }}">Listings</a></li>
        @endif
        <li class=""><a href="{{ URL::route('faq') }}">FAQ'S</a></li>
        <li><a href="{{ URL::route('contact') }}">Contact Us</a></li>
        <li><a href="{{ URL::route('pricing') }}">Pricing</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

        @if(Auth::check())

           <li class="dropdown">
             <a href="#" class="dropdown-toggle" style="" data-toggle="dropdown">{{ Auth::user()->name }}<b class="caret"></b></a>
             <ul class="dropdown-menu">
               <li><a href="{{ URL::route('dbd') }}">Dashboard</a></li>
               <li><a href="#">Settings</a></li>
               <li class="divider"></li>
               <li><a href="{{ URL::route('logout') }}">Logout</a></li>
             </ul>
           </li>

        @else

          <li><a href="{{ URL::route('register') }}">Register</a></li>
          <li><a href="{{ URL::route('login') }}">Login</a></li>

        @endif
      </ul>
    </div>
  </div>
</div>

