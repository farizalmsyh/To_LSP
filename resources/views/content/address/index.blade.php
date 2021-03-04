@extends('layouts.app')

@section('content')
<div class="container" style="min-height: 70.8vh">

<!-- Page Features -->
<div class="row justify-content-center my-5">
  <div class="col-lg-10 col-md-10 mb-2">
      <a href="{{ route('page.address.create') }}" class="btn btn-success float-right">Add new Address</a>
      <h3>My Address</h3>
  </div>
  <div class="col-lg-10 col-md-10 mb-4 h-100">
    <hr>
    <table class="table" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr align="center">
          <th>No</th>
          <th>Name</th>
          <th>Address</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($address as $key => $value)
        <tr align="center">
          <td>{{ $key+1 }}</td>
          <td>{{ $value->name }}</td>
          <td>{{ $value->address }}</td>
          <td><a href="{{ route('page.chart.delete', [$value->id]) }}" class="btn btn-sm btn-danger">Delete</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!-- /.row -->
</div>

@endsection
