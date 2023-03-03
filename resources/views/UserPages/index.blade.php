@extends('../template')

@section('main-content')
<section id="updateinfo">
    <div class="container pt-5">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Well done!</h4>
                    <p>You have done the task ....</p>
                    <hr>
                    <p class="mb-0">Go for it!.</p>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-md-9">
                <h2>Task</h2>
                <div class="row p-2">
                    <div class="card col-12 p-0">
                        <div class="card-header">
                            Task 1
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Final project Web programming</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-success" style="width: 75%"></div>
                            </div>
                            <hr>
                            <a href="#" class="btn btn-primary">Do task</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h2>Profile</h2>
                <div class="row">
                    <div class="col-12 text-center">
                        <img src="{{ $userData->user_picture }}" class="rounded-circle" alt="{{ $userData->user_name }}"><br><br>
                        <b>{{ $userData->user_name }}</b><br>
                        <span>
                            {{ $userData->user_gmail }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection