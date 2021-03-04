@extends('dashboard.layouts.app')

@section('content')
<main>
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <a href="{{ route('category.create') }}" class="btn btn-success btn-sm float-right">Add Category</a>
                <h4>List of Category</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataCategoryTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Name</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $key => $value)
                            <tr>
                                <td align="center">{{ $key+1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ \App\User::where('id', $value->created_by)->value('name') }}</td>
                                <td>{{ \Carbon\Carbon::parse($value->created_at)->isoFormat('dddd, DD MMMM YYYY') }}</td>
                                <td>
                                    <a href="{{ route('category.edit', [$value->id]) }}" class="btn btn-sm btn-warning "><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('category.delete', [$value->id]) }}" onclick="return confirm('Are you sure for delete this data ?')" class="btn btn-sm btn-danger "><i class="fas fa-trash"></i></a>
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