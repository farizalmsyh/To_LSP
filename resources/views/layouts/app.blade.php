<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Fariz Alamsyah">

  <title>On Food</title>

  @include('dev.link')

</head>

<body>

  <!-- Navigation -->
  @include('layouts.navbar')

  <!-- Page Content -->
  @yield('content')
  <!-- /.container -->

  <!-- Footer -->
  @include('layouts.footer')

  @include('dev.script')

</body>

</html>
