@extends('Auth.template')

@section('main-content')

<div class="container vh-100">
    <div class="row vh-100">
        <div class="col-md-3 d-none d-md-block"></div>
        <div class="col-md-6 my-auto">
            <div class="card text-center">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    @guest
                    <h5 class="card-title">Login with Google</h5>
                    <p class="card-text">Please login with your Google account so we can help you to manage your todo.</p>
                    <a href="{{url('/')}}" class="btn btn-secondary mb-3 mb-md-0 me-md-4 rounded-pill">Go back to home</a>
                    <a href="{{ url('auth/google') }}" class="btn btn-danger rounded-pill text-white"><i class="fa-brands fa-google"></i> Login with Google</a>
                    @else
                    <h5 class="card-title">You are already login</h5>
                    <p class="card-text">Enjoy to manage your todo list.</p>
                    <a href="{{ url('/') }}" class="btn btn-primary rounded-pill text-white">Go to my page</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

@endsection