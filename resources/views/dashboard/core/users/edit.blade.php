@extends('dashboard.layouts.app')

@section('content')
<main>
    <div class="container-fluid">
        <form class="row justify-content-center" action="{{ route('users.update', [$users->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-10">
                <label for="name">Name</label>
                <input class="form-control" name="name" value="{{ $users->name }}" placeholder="Enter name" required />
                @if ($errors->has('name'))
                   <span><strong class="text-danger">{{ $errors->first('name') }}</strong></span>
                @endif
            </div>
            <div class="form-group col-md-10">
                <label for="role">Role</label>
                <select class="form-control" name="role" required>
                    <option disabled selected>--Chose Role--</option>
                    <option value="admin" @if($users->role == 'admin') selected @endif>Admin</option>
                    <option value="courier" @if($users->role == 'courier') selected @endif>Courier</option>
                    <option value="user" @if($users->role == 'user') selected @endif>Regular User</option>
                </select>
                @if ($errors->has('role'))
                   <span><strong class="text-danger">{{ $errors->first('role') }}</strong></span>
                @endif
            </div>
            <div class="form-group col-md-10">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $users->email }}" placeholder="Enter email" required></input>
                @if ($errors->has('email'))
                   <span><strong class="text-danger">{{ $errors->first('email') }}</strong></span>
                @endif
            </div>
            <div class="form-group col-md-5">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password" required></input>
                @if ($errors->has('password'))
                   <span><strong class="text-danger">{{ $errors->first('password') }}</strong></span>
                @endif
            </div>
            <div class="form-group col-md-5">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Enter confirm password" required></input>
            </div>
            <div class="form-group col-md-10 mt-3">
                <button type="submit" class="btn btn-purple float-right">Submit</button>
            </div>
        </form>
    </div>
</main>
@endsection