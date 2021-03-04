@extends('dashboard.layouts.app')

@section('content')
<main>
    <div class="container-fluid">
        <form class="row justify-content-center" action="{{ route('category.save') }}" method="POST">
            @csrf
            <div class="form-group col-md-10">
                <label for="name">Category Name</label>
                <input class="form-control" name="name" placeholder="Enter category name"/>
            </div>
            <div class="form-group col-md-10 mt-3">
                <button type="submit" class="btn btn-purple float-right">Submit</button>
            </div>
        </form>
    </div>
</main>
@endsection