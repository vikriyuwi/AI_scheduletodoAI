@extends('../template')

@section('main-content')
<section id="updateinfo">
    <div class="container">
        <div class="row">
            <div class="col-md-9 pt-5">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="fw-bold">Task</h1>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="{{ url('/todo/create') }}" class="btn btn-success" id="addNewButtonPrimary"><i class="fa-solid fa-plus"></i> add todo</a>
                    </div>
                </div>
                {{-- priority todo --}}
                @if($prioritytodos->count() != 0)
                    <div class="card bg-warning mt-4">
                        <div class="card-header">
                            <div class="me-auto">
                                <h3 class="fw-bold">Priority todo</h3>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            @foreach ($prioritytodos as $index => $todo) 
                            <div class="row p-3">
                                <div class="card col-12 p-0">
                                    <div class="card-header">
                                        <div class="d-flex">
                                            <div class="me-auto fst-italic">
                                                Todo #<span class="fw-bold">{{$index+1}}</span>
                                            </div>
                                            <div>
                                                <i class="fa-regular fa-clock"></i> {{$todo->todo_deadline}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">{{ $todo->todo_name }}</h5>
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
                                        <div class="row align-items-center">
                                            <div class="col-sm-6">
                                                Task difficulty:
                                                <div class="text-danger">
                                                    @for($i=1;$i<=5;$i++)
                                                        @if($i<=$todo->todo_difficulty_level)
                                                            <i class="fa-solid fa-star"></i>
                                                        @else
                                                            <i class="fa-regular fa-star"></i>   
                                                        @endif
                                                    @endfor
                                                    {{$todo->todo_difficulty_level}}
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-end">
                                                <a href="{{url('todo/'.$todo->todo_id)}}" class="btn btn-primary">Detail</a>
                                                <a href="#" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
                                                <a href="#" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @if($prioritytodos->count() != 0)
                    <div class="card mt-4">
                        <div class="card-header">
                            <div class="me-auto">
                                <h3 class="fw-bold">Other todo</h3>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            @foreach ($nonprioritytodos as $index => $todo) 
                            <div class="row p-3">
                                <div class="card col-12 p-0">
                                    <div class="card-header">
                                        <div class="d-flex">
                                            <div class="me-auto fst-italic">
                                                Todo #<span class="fw-bold">{{$index+1}}</span>
                                            </div>
                                            <div>
                                                <i class="fa-regular fa-clock"></i> {{$todo->todo_deadline}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">{{ $todo->todo_name }}</h5>
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
                                        <div class="row align-items-center">
                                            <div class="col-sm-6">
                                                Task difficulty:
                                                <div class="text-danger">
                                                    @for($i=1;$i<=5;$i++)
                                                        @if($i<=$todo->todo_difficulty_level)
                                                            <i class="fa-solid fa-star"></i>
                                                        @else
                                                            <i class="fa-regular fa-star"></i>   
                                                        @endif
                                                    @endfor
                                                    {{$todo->todo_difficulty_level}}
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-end">
                                                <a href="{{url('todo/'.$todo->todo_id)}}" class="btn btn-primary">Detail</a>
                                                <a href="#" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
                                                <a href="#" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                @else
                    <div class="row p-2">
                        <div class="card col-12 p-0">
                            <div class="card-body p-5">
                                <h5 class="card-title">You are not having any todo</h5>
                                <p class="card-text">You can assign your todo in the button bellow.</p>
                                <a href="{{ url('todo/create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> add todo</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-3">
                <div class="row sticky-top">
                    <div class="col-12 mt-5">
                        <a href="{{ url('/todo/create') }}" class="btn my-5 btn-success d-none" id="addNewButton"><i class="fa-solid fa-plus"></i> add todo</a>
                        <h2>Profile</h2>
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

@section('additionalScript')
<script>
    function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
    
    var addDistance = $('#addNewButtonPrimary').offset().top;
    console.log(addDistance);

    window.onscroll = function(element) {
        if(window.pageYOffset >= addDistance)
        {
            console.log('yes');
            $('#addNewButton').removeClass('d-none');
        } else {
            $('#addNewButton').addClass('d-none');
        }
        // if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
        //     alert("you're at the bottom of the page");
        // }
    };
</script>
@endsection