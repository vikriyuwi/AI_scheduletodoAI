@extends('template')

@section('main-content')

<div class="container my-auto">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <h5 class="card-title">Login with Google</h5>
                    <p class="card-text">Please login with your Google account so we can help you to manage your todo.</p>
                    <a href="{{ url('auth/google') }}" class="btn btn-danger"><i class="fa-brands fa-google"></i> Login with Google</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection