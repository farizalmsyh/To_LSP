@extends('dashboard.layouts.app')

@section('content')
<main>
  <div class="container-fluid">
    <div class="card mb-5">
      <div class="card-header bg-primary text-white">
        <h4>On Process</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataProsesTable" width="100%" cellspacing="0">
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
                      <td>{{ \App\Model\Address::where('id', $value->id_address)->value('address') }}</td>
                      <td>Rp. {{ number_format($value->price) }}</td>
                      <td>{{ \Carbon\Carbon::parse($value->created_at)->isoFormat('DD MMMM YYYY') }}</td>
                      <td>
                        <a onclick="return confirm('Cancel this transaction ?')" href="{{ route('transaction.cancel', [$value->id]) }}" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
                        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#courireModal{{$key}}"><i class="fas fa-check"></i></a>
                        <div class="modal fade" id="courireModal{{$key}}" tabindex="-1" aria-labelledby="courireModalLabel{{$key}}" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="courireModalLabel{{$key}}">Accept Transaction</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form class="" action="{{ route('transaction.accept', [$value->id]) }}" method="POST">
                                @csrf
                                <div class="modal-body row justify-content-center">
                                    <div class="form-group col-md-6">
                                      <label>Address Name</label>
                                      <input class="form-control" value="{{ \App\Model\Address::where('id', $value->id_address)->value('name') }}" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label>Price</label>
                                      <input class="form-control" value="Rp. {{ number_format($value->price) }}" disabled>
                                    </div>
                                    <div class="form-group col-md-12">
                                      <label>Address</label>
                                      <textarea class="form-control" value="" disabled>{{ \App\Model\Address::where('id', $value->id_address)->value('address') }}</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                      <label for="id_courier">Courire</label>
                                      <select class="form-control" name="id_courier">
                                        <option disabled selected>--Choose Courier--</option>
                                        @foreach($courier as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-success">Confirm</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
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
                        <th>Courier</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($deliver as $key => $value)
                    <tr align="center">
                      <td>{{ $key+1 }}</td>
                      <td>{{ \App\Model\Address::where('id', $value->id_address)->value('address') }}</td>
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
                        <th>Courier</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($arrive as $key => $value)
                    <tr align="center">
                      <td>{{ $key+1 }}</td>
                      <td>{{ \App\Model\Address::where('id', $value->id_address)->value('address') }}</td>
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
                        <th>Courier</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accept as $key => $value)
                    <tr align="center">
                      <td>{{ $key+1 }}</td>
                      <td>{{ \App\Model\Address::where('id', $value->id_address)->value('address') }}</td>
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
<div class="card mb-5">
    <div class="card-header bg-danger text-white">
        <h4>Reject</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataRejectTable" width="100%" cellspacing="0">
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
                      <td>{{ \App\Model\Address::where('id', $value->id_address)->value('address') }}</td>
                      <td>Rp. {{ number_format($value->price) }}</td>
                      <td>{{ \Carbon\Carbon::parse($value->created_at)->isoFormat('DD MMMM YYYY') }}</td>
                      <td><a onclick="return confirm('Delete this transaction ?')" href="{{ route('transaction.delete', [$value->id]) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
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