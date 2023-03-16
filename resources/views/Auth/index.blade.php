@extends('Auth.template')

@section('main-content')

<div class="container vh-100">
    <div class="row vh-100">
        <div class="col-md-5 text-md-start text-center my-auto p-5">
            <img src="{{ url('assets/logo/icon.png') }}" alt="logo box" width="96">
            <div class="row mt-4">
                <div class="col-12 mb-2">
                    <h1>Google login</h1>
                    <p>Your one step closer for managing your tasks and staying on top of your to-do list. 
                    Log in now and start achieving your goals one task at a time.</p>
                </div>
                <div class="">
                    <a href="{{ url('auth/google') }}" class="btn btn-danger rounded-pill text-white mb-2 d-block"><i class="fa-brands fa-google"></i> Login with Google</a>
                    <a href="{{url('/')}}" class="btn btn-secondary rounded-pill d-block">Go back to home</a> 
                </div>
            </div>
        </div>
        <div class="col-md-2 d-none d-md-block"></div>
        <div class="col-md-5 my-auto d-none d-md-block p-5 vh-100">
            <img src="{{ url('assets/element/Component_4.png') }}" alt="pic login" class="img-fluid rounded-5" style="height:100%">
        </div>
    </div>
</div>

@endsection

{{-- <div class="col-md-3 d-none d-md-block"></div>
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
            </div> --}}