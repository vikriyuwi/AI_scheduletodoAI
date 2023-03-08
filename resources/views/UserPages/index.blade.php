@extends('../template')

@section('main-content')
<section id="updateinfo">
    <div class="container pt-5">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">Well done!</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p>You have done the task ....</p>
                    <hr>
                    <p class="mb-0">Go for it!.</p>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-md-9">
                <h2>Todo</h2>
                @if($todos->count() != 0)
                    @foreach ($todos as $index => $todo) 
                    <div class="row p-2">
                        <div class="card col-12 p-0">
                            <div class="card-header">
                                Todo
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $todo->todo_name }}</h5>
                                <p class="card-text">{{ $todo->todo_note }}</p>
                                <div class="row">
                                    <div class="col-10 col-md-11">
                                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-success" style="width: {{ ($todo->TodoProgress->todo_progress /  $todo->TodoProgress->todo_total * 100) . '%'}}"></div>
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-1 text-end">
                                        <span>{{ (int)($todo->TodoProgress->todo_progress /  $todo->TodoProgress->todo_total * 100)}}%</span>
                                    </div>
                                </div>     
                                
                                <hr>
                                <a href="#" class="btn btn-primary">Do task</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="row p-2">
                        <div class="card col-12 p-0">
                            <div class="card-body p-5">
                                <h5 class="card-title">You are not having any todo</h5>
                                <p class="card-text">You can assign your todo in the button bellow.</p>
                                <a href="{{ url('/todo/create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> add todo</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-3">
                <h2>Profile</h2>
                <div class="row">
                    <div class="col-12">
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