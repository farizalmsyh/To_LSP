@extends('dashboard.layouts.app')

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mb-4">Dashboard</h1>
        <div class="row">
            <div class="col-xl-4 col-md-8">
                <div class="card bg-primary text-white mb-5">
                    <div class="card-body">On Proses</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('transaction') }}"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;{{ $proses }}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-8">
                <div class="card bg-success text-white mb-5">
                    <div class="card-body">Accepted</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('transaction') }}"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;{{ $accept }}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-8">
                <div class="card bg-danger text-white mb-5">
                    <div class="card-body">Canceled</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('transaction') }}"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;{{ $cancel }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-3">
            <div class="jumbotron my-2 bg-purple col-md-12">
                <h1 class="display-3 text-white font-weight-bolder">Welcome to Dashboard On Food !</h1>
            </div>
        </div>  
    </div>
</main>
@endsection