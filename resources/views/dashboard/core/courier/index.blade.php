@extends('dashboard.layouts.app')

@section('content')
<main>
  <div class="container-fluid">
    <div class="card mb-5">
        <div class="card-header bg-warning text-white">
            <h4>On Deliver</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataDeliverTable" width="100%" cellspacing="0">
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
                        @foreach($deliver as $key => $value)
                        <tr align="center">
                          <td>{{ $key+1 }}</td>
                          <td>{{ \App\Model\Address::where('id', $value->id_address)->value('address') }}</td>
                          <td>Rp. {{ number_format($value->price) }}</td>
                          <td>{{ \Carbon\Carbon::parse($value->created_at)->isoFormat('DD MMMM YYYY') }}</td>
                          <td><a href="{{ route('order.arrive', [$value->id]) }}" class="btn btn-success"><i class="fas fa-check"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-5">
        <div class="card-header bg-info text-white">
            <h4>Arrive</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataArriveTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Address</th>
                            <th>Price</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($arrive as $key => $value)
                        <tr align="center">
                          <td>{{ $key+1 }}</td>
                          <td>{{ \App\Model\Address::where('id', $value->id_address)->value('address') }}</td>
                          <td>Rp. {{ number_format($value->price) }}</td>
                          <td>{{ \Carbon\Carbon::parse($value->created_at)->isoFormat('DD MMMM YYYY') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-5">
        <div class="card-header bg-success text-white">
            <h4>Accept</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataAcceptTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Address</th>
                            <th>Price</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($accept as $key => $value)
                        <tr align="center">
                          <td>{{ $key+1 }}</td>
                          <td>{{ \App\Model\Address::where('id', $value->id_address)->value('address') }}</td>
                          <td>Rp. {{ number_format($value->price) }}</td>
                          <td>{{ \Carbon\Carbon::parse($value->created_at)->isoFormat('DD MMMM YYYY') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</main>
@endsection