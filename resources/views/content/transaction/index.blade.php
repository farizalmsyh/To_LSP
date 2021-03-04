@extends('layouts.app')

@section('content')
<div class="container" style="min-height: 70.8vh">

<!-- Page Features -->
<div class="row my-5 justify-content-center">
  <div class="col-lg-10 col-md-10 mb-2">
      <h3>My Transaction</h3>
  </div>
  <div class="col-lg-10 col-md-10 mb-5  h-100">
    <hr>
    <div class="card">
      <div class="card-header bg-primary text-white">
        <h5 class="card-title">On Process</h5>
      </div>
      <div class="card-body">
        <table class="table" id="dataProsesTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center">
              <th>No</th>
              <th>Address</th>
              <th>Price</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($proses as $key => $value)
            <tr align="center">
              <td>{{ $key+1 }}</td>
              <td>{{ \App\Model\Address::where('id', $value->id_address)->value('name') }}</td>
              <td>Rp. {{ number_format($value->price) }}</td>
              <td>{{ \Carbon\Carbon::parse($value->created_at)->isoFormat('DD MMMM YYYY') }}</td>
              <td><a onclick="return confirm('Cancel this transaction ?')" href="{{ route('page.transaction.cancel', [$value->id]) }}" class="btn btn-danger btn-sm">Cancel</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-10 col-md-10 mb-5  h-100">
    <hr>
    <div class="card">
      <div class="card-header bg-warning text-white">
        <h5 class="card-title">On Deliver</h5>
      </div>
      <div class="card-body">
        <table class="table" id="dataDeliverTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center">
              <th>No</th>
              <th>Address</th>
              <th>Price</th>
              <th>Date</th>
              <th>Courire</th>
            </tr>
          </thead>
          <tbody>
            @foreach($deliver as $key => $value)
            <tr align="center">
              <td>{{ $key+1 }}</td>
              <td>{{ \App\Model\Address::where('id', $value->id_address)->value('name') }}</td>
              <td>Rp. {{ number_format($value->price) }}</td>
              <td>{{ \Carbon\Carbon::parse($value->created_at)->isoFormat('DD MMMM YYYY') }}</td>
              <td>{{ \App\User::where('id', $value->id_courier)->value('name') }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-10 col-md-10 mb-5  h-100">
    <hr>
    <div class="card">
      <div class="card-header bg-info text-white">
        <h5 class="card-title">Arrive</h5>
      </div>
      <div class="card-body">
        <table class="table" id="dataArriveTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center">
              <th>No</th>
              <th>Address</th>
              <th>Price</th>
              <th>Date</th>
              <th>Courire</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($arrive as $key => $value)
            <tr align="center">
              <td>{{ $key+1 }}</td>
              <td>{{ \App\Model\Address::where('id', $value->id_address)->value('name') }}</td>
              <td>Rp. {{ number_format($value->price) }}</td>
              <td>{{ \Carbon\Carbon::parse($value->created_at)->isoFormat('DD MMMM YYYY') }}</td>
              <td>{{ \App\User::where('id', $value->id_courier)->value('name') }}</td>
              <td><a href="{{ route('page.transaction.accept', [$value->id]) }}" class="btn btn-success btn-sm">Confirm</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-10 col-md-10 mb-5  h-100">
    <hr>
    <div class="card">
      <div class="card-header bg-success text-white">
        <h5 class="card-title">Accepted</h5>
      </div>
      <div class="card-body">
        <table class="table" id="dataAcceptTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center">
              <th>No</th>
              <th>Address</th>
              <th>Price</th>
              <th>Date</th>
              <th>Courire</th>
            </tr>
          </thead>
          <tbody>
            @foreach($accept as $key => $value)
            <tr align="center">
              <td>{{ $key+1 }}</td>
              <td>{{ \App\Model\Address::where('id', $value->id_address)->value('name') }}</td>
              <td>Rp. {{ number_format($value->price) }}</td>
              <td>{{ \Carbon\Carbon::parse($value->created_at)->isoFormat('DD MMMM YYYY') }}</td>
              <td>{{ \App\User::where('id', $value->id_courier)->value('name') }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-10 col-md-10 mb-5  h-100">
    <hr>
    <div class="card">
      <div class="card-header bg-danger text-white">
        <h5 class="card-title">Reject</h5>
      </div>
      <div class="card-body">
        <table class="table" id="dataRejectTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center">
              <th>No</th>
              <th>Address</th>
              <th>Price</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($reject as $key => $value)
            <tr align="center">
              <td>{{ $key+1 }}</td>
              <td>{{ \App\Model\Address::where('id', $value->id_address)->value('name') }}</td>
              <td>Rp. {{ number_format($value->price) }}</td>
              <td>{{ \Carbon\Carbon::parse($value->created_at)->isoFormat('DD MMMM YYYY') }}</td>
              <td><a onclick="return confirm('Delete this transaction ?')" href="{{ route('page.transaction.delete', [$value->id]) }}" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</div>
<!-- /.row -->
</div>

@endsection
