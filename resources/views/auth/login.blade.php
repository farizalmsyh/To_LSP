@extends('auth.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center font-weight-bolder text-white">Sign In</h2>
            <div class="card">
                <div class="card-body">
                    <form method="POST" class="row justify-content-center" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group col-md-12">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 text-center mt-4">
                            <button class="btn btn-purple btn-block">Sign In</button>
                        </div>
                        <div class="form-group col-md-12 text-center">
                            <a href="{{ route('register') }}">Don't have an account ? Sign Up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
