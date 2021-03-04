<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-purple fixed-top">
<div class="container">
    <a class="navbar-brand font-weight-bolder" href="#">On Food !</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-2 @if((request()->segment(1)) == '') active nav-item-active @endif">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link @if((request()->segment(1)) == 'menu') active nav-item-active @endif" href="{{ route('page.menu') }}">Menu</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link @if((request()->segment(1)) == 'chart') active nav-item-active @endif" href="{{ route('page.chart') }}">Cart</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link @if((request()->segment(1)) == 'transaction') active nav-item-active @endif" href="{{ route('page.transaction') }}">Transaction</a>
            </li>
              @guest
            <li class="nav-item mx-2">
                <a class="nav-link" href="{{ route('login') }}">Sign In</a>
            </li>
              @else
            <li class="nav-item mx-2 dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    @if(\Auth::user()->role == 'admin')
                    <a class="dropdown-item" href="{{ route('dashboard') }}" >
                        Dashboard
                    </a>
                    <div class="dropdown-divider"></div>
                    @endif
                    @if(\Auth::user()->role == 'courier')
                    <a class="dropdown-item" href="{{ route('order') }}" >
                        Order
                    </a>
                    <div class="dropdown-divider"></div>
                    @endif
                    <a class="dropdown-item" href="{{ route('page.address') }}" >
                        Address
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" 
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Sign Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
      @endguest
    </ul>
  </div>
</div>
</nav>