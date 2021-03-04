@extends('dashboard.layouts.app')

@section('content')
<main>
    <div class="container-fluid">
        <form class="row justify-content-center" action="{{ route('menu.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-10">
                <label for="name">Name</label>
                <input class="form-control" name="name" placeholder="Enter name" required />
            </div>
            <div class="form-group col-md-10">
                <label for="id_category">Category</label>
                <select class="form-control" name="id_category" required>
                    <option disabled selected>--Chose Category--</option>
                    @foreach(\App\Model\Category::all() as $key => $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-10">
                <label for="desctiption">Description</label>
                <textarea class="form-control" name="description" rows="3" placeholder="Enter Description"></textarea>
            </div>
            <div class="form-group col-md-5">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" placeholder="Enter price" required></input>
            </div>
            <div class="form-group col-md-5">
                <label for="picture">Picture</label>
                <input type="file" class="form-control" name="picture" required></input>
                @if ($errors->has('picture'))
                   <span><strong class="text-danger">{{ $errors->first('picture') }}</strong></span>
                @endif
            </div>
            <div class="form-group col-md-10 mt-3">
                <button type="submit" class="btn btn-purple float-right">Submit</button>
            </div>
        </form>
    </div>
</main>
@endsection