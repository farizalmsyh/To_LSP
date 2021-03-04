<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - On Food</title>
        <!-- Link -->
        @include('dashboard.dev.link')
    </head>
    <body class="sb-nav-fixed">
        @include('sweetalert::alert')
        @include('dashboard.layouts.navbar')
        <div id="layoutSidenav">
            @include('dashboard.layouts.sidebar')
            <div id="layoutSidenav_content">
                @yield('content')
                @include('dashboard.layouts.footer')
            </div>
        </div>
        
        <!-- Script -->
        @include('dashboard.dev.script')
    </body>
</html>
