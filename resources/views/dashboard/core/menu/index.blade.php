@extends('dashboard.layouts.app')

@section('content')
<main>
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <a href="{{ route('menu.create') }}" class="btn btn-success btn-sm float-right">Add Menu</a>
                <h4>List of Menu</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataMenuTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Picture</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menu as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ \App\Model\Category::where('id', $value->id_category)->value('name') }}</td>
                                <td>{{ number_format($value->price) }}</td>
                                <td>Picture</td>
                                <td>
                                    <a href="{{ route('menu.edit', [$value->id]) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('menu.delete', [$value->id]) }}" onclick="return confirm('Are you sure for delete this data ?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
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