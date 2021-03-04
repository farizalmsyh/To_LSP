<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Page</div>

                @if(\Auth::user()->role == 'admin')
                <a class="nav-link {{ (request()->segment(2) == 'panel') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                
                <a class="nav-link {{ (request()->segment(2) == 'category') || (request()->segment(2) == 'menu') ? '' : 'collapse' }}" href="#" data-toggle="collapse" data-target="#collapseLists" aria-expanded="true" aria-controls="collapseLists">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    List
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ (request()->segment(2) == 'category') || (request()->segment(2) == 'menu') ? 'show' : '' }}" id="collapseLists" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ (request()->segment(2) == 'category') ? 'active' : '' }}" href="{{ route('category') }}">Category</a>
                        <a class="nav-link {{ (request()->segment(2) == 'menu') ? 'active' : '' }}" href="{{ route('menu') }}">Menu</a>
                    </nav>
                </div>
                <a class="nav-link {{ (request()->segment(2) == 'users') || (request()->segment(2) == 'transaction') ? '' : 'collapse' }}" href="#" data-toggle="collapse" data-target="#collapseManages" aria-expanded="false" aria-controls="collapseManages">
                    <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                    Manage
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ (request()->segment(2) == 'users') || (request()->segment(2) == 'transaction') ? 'show' : '' }}" id="collapseManages" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ (request()->segment(2) == 'users') ? 'active' : '' }}" href="{{ route('users') }}">Users</a>
                        <a class="nav-link {{ (request()->segment(2) == 'transaction') ? 'active' : '' }}" href="{{ route('transaction') }}">Transaction</a>
                    </nav>
                </div>
                @endif
                
                <a class="nav-link {{ (request()->segment(2) == 'order') ? 'active' : '' }}" href="{{ route('order') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                    Order
                </a>
            </div>
        </div>
    </nav>
</div>