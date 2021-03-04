@extends('layouts.app')

@section('content')
<div class="container" style="min-height: 70.8vh">

<!-- Page Features -->
<div class="row my-5">
  <div class="col-lg-12 col-md-12 mb-4 h-100">
    <form class="row justify-content-center" action="{{ route('page.address.save') }}" method="POST">
      @csrf
      <div class="form-group col-md-10">
          <label for="name">Address Name</label>
          <input class="form-control" name="name" placeholder="Enter address name"/>
      </div>
      <div class="form-group col-md-10">
          <label for="name">Full Address</label>
          <textarea name="address" class="form-control" placeholder="Enter full address" rows="3"></textarea>
      </div>
      <div class="form-group col-md-10 mt-3">
          <button type="submit" class="btn btn-purple float-right">Submit</button>
      </div>
    </form>
  </div>
</div>
<!-- /.row -->
</div>

@endsection
