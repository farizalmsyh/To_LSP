@extends('layouts.app')

@section('content')
<div class="container" style="min-height: 70.8vh">

<!-- Page Features -->
<div class="row justify-content-center my-5">
  <div class="col-lg-10 col-md-10 mb-2">
      <a href="{{ route('page.chart.destination') }}" class="btn btn-success float-right">Order</a>
      <h3>My Cart</h3>
  </div>
  <div class="col-lg-10 col-md-10 mb-4 h-100">
    <hr>
    <table class="table" id="dataCartTable" width="100%" cellspacing="0">
      <thead>
        <tr align="center">
          <th>Name</th>
          <th>Count</th>
          <th>Price</th>
          <th>Total Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $totalPrice = 0;
        ?>
        @foreach($chart as $key => $value)
        <?php
          $menu = \App\Model\Menu::where('id', $value->id_menu)->first();
          $subTotalPrice = $value->count * $menu->price;
          $totalPrice += $subTotalPrice;
        ?>
        <tr align="center">
          <td>{{ $menu->name }}</td>
          <td>{{ $value->count }}</td>
          <td>Rp. {{ number_format($menu->price) }}</td>
          <td>Rp. {{ number_format($subTotalPrice) }}</td>
          <td><a href="{{ route('page.chart.delete', [$value->id]) }}" class="btn btn-sm btn-danger">Delete</a></td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr align="center">
          <th></th>
          <th></th>
          <th></th>
          <th>Rp. {{ number_format($totalPrice) }}</th>
          <th></th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
<!-- /.row -->
</div>

@endsection
