@extends('layouts.app')

@section('content')
<div class="container">

<!-- Jumbotron Header -->
<header class="jumbotron my-4 bg-purple">
  <h1 class="display-3 text-white font-weight-bolder">Welcome to On Food !</h1>
  <p class="lead text-white">with On Food, ordering food and drinks is easier</p>
</header>

<!-- Page Features -->
<div class="row mb-5">
  <div class="col-lg-12 col-md-12 mb-2">
      <h3>Menu</h3>
      <a href="{{ route('page.menu') }}" class="float-right">Go to Menu page for more ...</a>
  </div>
  @foreach($menu as $key => $value)
  <div class="col-lg-3 col-md-6 mb-4">
    <div class="card h-100">
      <img class="card-img-top" width="500" height="200" src="{{ asset('pict/menu/'.$value->picture) }}" alt="">
      <div class="card-body bg-purple text-white">
        <h4 class="card-title">{{ $value->name }}</h4>
        <p class="card-text">{{ $value->description }}</p>
      </div>
      <div class="card-footer bg-pinch">
        <div class="card-text float-right">
          <button class="btn btn-sm btn-purple">
          Rp. {{ number_format($value->price) }}    
          </button>
        </div>
      </div>
    </div>
  </div>
  @endforeach

</div>
<!-- /.row -->

</div>
@endsection
