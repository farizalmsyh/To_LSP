@extends('layouts.app')

@section('content')
<div class="container">

<!-- Page Features -->
@foreach($category as $key => $value)
<div class="row my-5">
  <div class="col-lg-12 col-md-12 mb-2">
      <h3>{{ $value->name}}</h3>
  </div>
  @foreach(\App\Model\Menu::where('id_category', $value->id)->get() as $keys => $values)
  <div class="col-lg-3 col-md-6 mb-4">
    <div class="card h-100">
      <img class="card-img-top" width="500" height="200" src="{{ asset('pict/menu/'.$values->picture) }}" alt="">
      <div class="card-body bg-purple text-white">
        <h4 class="card-title">{{ $values->name }}</h4>
        <p class="card-text">{{ $values->description }}</p>
      </div>
      <div class="card-footer bg-pinch">
        <div class="card-text float-right">
          <button type="button" class="btn btn-sm btn-purple" data-toggle="modal" data-target="#addChartModal{{$key}}And{{$keys}}">
          Rp. {{ number_format($values->price) }}    
          </button>
          <div class="modal fade" id="addChartModal{{$key}}And{{$keys}}" tabindex="-1" aria-labelledby="addChartLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addChartLabel">Total Order {{ $values->name }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="{{ route('page.chart.save') }}">
                  @csrf
                  <div class="modal-body">
                      <input type="hidden" name="id_menu" value="{{ $values->id }}">
                      <div class="form-group">
                        <input class="form-control" name="count" type="number" value="1" min="1" required></input>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endforeach
<!-- /.row -->
</div>



@endsection
