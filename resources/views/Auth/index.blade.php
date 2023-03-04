@extends('auth/template')

@section('main-content')

<div class="container my-auto p-2 p-md-5">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    @guest
                    <h5 class="card-title">Login with Google</h5>
                    <p class="card-text">Please login with your Google account so we can help you to manage your todo.</p>
                    <a href="{{ url('auth/google') }}" class="btn btn-danger"><i class="fa-brands fa-google"></i> Login with Google</a>
                    @else
                    <h5 class="card-title">You are already login</h5>
                    <p class="card-text">Enjoy to manage your todo list.</p>
                    <a href="{{ url('/') }}" class="btn btn-primary">Go to my page</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

@endsection