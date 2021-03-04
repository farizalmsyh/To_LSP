@extends('dashboard.layouts.app')

@section('content')
<main>
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <a href="{{ route('users.create') }}" class="btn btn-success btn-sm float-right">Add Users</a>
                <h4>List of Users</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th align="center">No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $value)
                            <tr>
                                <td align="center">{{ $key+1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td class="text-capitalize">{{ $value->role }}</td>
                                <td>
                                    <a href="{{ route('users.edit', [$value->id]) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    @if(Auth::user()->id != $value->id)
                                    <a href="{{ route('users.delete', [$value->id]) }}" onclick="return confirm('Are you sure for delete this data ?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    @endif
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