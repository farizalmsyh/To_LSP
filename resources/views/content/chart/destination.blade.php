@extends('layouts.app')

@section('content')
<div class="container" style="min-height: 70.8vh">

<!-- Page Features -->
<div class="row justify-content-center my-5">
  <div class="col-lg-10 col-md-10 mb-2">
      <a href="{{ route('page.address') }}" class="btn btn-success float-right">Add new address</a>
      <h3>Choose your address</h3>
  </div>
  <div class="col-lg-12 col-md-12 my-4 h-100">
    <form class="row justify-content-center" action="{{ route('page.transaction.save-temp') }}" method="POST">
      @csrf
      <div class="form-group col-md-10">
        <label for="address">Address</label>
        <select class="form-control" name="id_address">
          <option disabled selected>--Choose Address--</option>
          @foreach($address as $key => $value)
          <option value="{{ $value->id }}">{{ $value->address }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-10">
        <button type="submit" class="btn btn-purple float-right">Confirm</button>
      </div>
    </form>
  </div>
</div>
<!-- /.row -->
</div>

@endsection
