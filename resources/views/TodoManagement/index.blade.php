@extends('../template')

@section('main-content')
{{-- modal confirm delete --}}
<div class="modal fade " id="modal-confirm-delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Opps..</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="" method="post" class="ms-2" onsubmit="showLoadingScreen()">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<section id="updateinfo">
    <div class="container">
        @if (session('message'))
            <div class="alert alert-{{ session('messageType') }} d-flex align-items-center alert-dismissible fade show" role="alert">
                @if (session('messageType') == 'success')
                    <i class="fa-solid fa-circle-check"></i>
                @else
                    <i class="fa-solid fa-circle-exclamation"></i>
                @endif
                <div>
                    {{ ' '.session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
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
                                                <i class="fa-regular fa-clock"></i> {{intval((abs(strtotime($currentDate) - strtotime($todo->todo_deadline)))/86400)}}d
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">{{ $todo->todo_name }}</h5>
                                        <p class="card-text">{{ $todo->todo_note }}</p>
                                        <div class="row">
                                            <div class="col-10 col-md-11">
                                                <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar bg-success" style="width: {{ ($todo->TodoProgress->step_done /  $todo->TodoProgress->step_total * 100) . '%'}}"></div>
                                                </div>
                                            </div>
                                            <div class="col-2 col-md-1 text-end">
                                                <span>{{ (int)($todo->TodoProgress->step_done /  $todo->TodoProgress->step_total * 100)}}%</span>
                                            </div>
                                        </div>     
                                        
                                        <hr>
                                        <div class="row align-items-center">
                                            <div class="col-sm-6">
                                                Task difficulty:
                                                <div>
                                                    @for($i=1;$i<=5;$i++)
                                                        @if($i<=$todo->todo_difficulty_level)
                                                            <i class="fa-solid fa-fire text-danger"></i>
                                                        @else
                                                            <i class="fa-solid fa-fire text-secondary"></i>  
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-end d-flex">
                                                <a href="{{url('todo/'.$todo->todo_id)}}" class="btn btn-primary ms-auto">Detail</a>
                                                <button class="ms-2 btn btn-danger" data-todo="{{ $todo->todo_name }}" data-action="{{ url('todo/'.$todo->todo_id) }}" data-bs-toggle="modal" data-bs-target="#modal-confirm-delete">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @if($nonprioritytodos->count() != 0)
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
                                                <i class="fa-regular fa-clock"></i> {{intval((abs(strtotime($currentDate) - strtotime($todo->todo_deadline)))/86400)}}d
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">{{ $todo->todo_name }}</h5>
                                        <p class="card-text">{{ $todo->todo_note }}</p>
                                        <div class="row">
                                            <div class="col-10 col-md-11">
                                                <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar bg-success" style="width: {{ ($todo->TodoProgress->step_done /  $todo->TodoProgress->step_total * 100) . '%'}}"></div>
                                                </div>
                                            </div>
                                            <div class="col-2 col-md-1 text-end">
                                                <span>{{ (int)($todo->TodoProgress->step_done /  $todo->TodoProgress->step_total * 100)}}%</span>
                                            </div>
                                        </div>        
                                        <hr>
                                        <div class="row align-items-center">
                                            <div class="col-sm-6">
                                                Task difficulty:
                                                <div>
                                                    @for($i=1;$i<=5;$i++)
                                                        @if($i<=$todo->todo_difficulty_level)
                                                            <i class="fa-solid fa-fire text-danger"></i>
                                                        @else
                                                            <i class="fa-solid fa-fire text-secondary"></i>  
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-end d-flex">
                                                <a href="{{url('todo/'.$todo->todo_id)}}" class="btn btn-primary ms-auto">Detail</a>
                                                <button class="ms-2 btn btn-danger" data-todo="{{ $todo->todo_name }}" data-action="{{ url('todo/'.$todo->todo_id) }}" data-bs-toggle="modal" data-bs-target="#modal-confirm-delete">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
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
                                <h5 class="card-title">You are not having any thing to do</h5>
                                <p class="card-text">You can assign your todo in the button bellow.</p>
                                <a href="{{ url('todo/create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> add todo</a>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- todo done --}}
                @if($donetodos->count() != 0)
                <div class="card mt-4 bg-success">
                    <div class="card-header">
                        <div class="me-auto">
                            <h3 class="fw-bold">Todo done</h3>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        @foreach ($donetodos as $index => $todo) 
                        <div class="row p-3">
                            <div class="card col-12 p-0">
                                <div class="card-header">
                                    <div class="d-flex">
                                        <div class="me-auto fst-italic">
                                            Todo #<span class="fw-bold">{{$index+1}}</span>
                                        </div>
                                        <div>
                                            <i class="fa-regular fa-clock"></i> {{intval((abs(strtotime($currentDate) - strtotime($todo->todo_deadline)))/86400)}}d
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $todo->todo_name }}</h5>
                                    <p class="card-text">{{ $todo->todo_note }}</p>
                                    <div class="row">
                                        <div class="col-10 col-md-11">
                                            <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar bg-success" style="width: {{ ($todo->TodoProgress->step_done /  $todo->TodoProgress->step_total * 100) . '%'}}"></div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-1 text-end">
                                            <span>{{ (int)($todo->TodoProgress->step_done /  $todo->TodoProgress->step_total * 100)}}%</span>
                                        </div>
                                    </div>        
                                    <hr>
                                    <div class="row align-items-center">
                                        <div class="col-sm-6">
                                            Task difficulty:
                                            <div>
                                                @for($i=1;$i<=5;$i++)
                                                    @if($i<=$todo->todo_difficulty_level)
                                                        <i class="fa-solid fa-fire text-danger"></i>
                                                    @else
                                                        <i class="fa-solid fa-fire text-secondary"></i>  
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-end d-flex">
                                            <a href="{{url('todo/'.$todo->todo_id)}}" class="btn btn-primary ms-auto">Detail</a>
                                            <button class="ms-2 btn btn-danger" data-todo="{{ $todo->todo_name }}" data-action="{{ url('todo/'.$todo->todo_id) }}" data-bs-toggle="modal" data-bs-target="#modal-confirm-delete">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                {{-- todo done --}}
                @if($notdonetodos->count() != 0)
                <div class="card mt-4 bg-danger mb-4">
                    <div class="card-header">
                        <div class="me-auto">
                            <h3 class="fw-bold">Todo late</h3>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        @foreach ($notdonetodos as $index => $todo) 
                        <div class="row p-3">
                            <div class="card col-12 p-0">
                                <div class="card-header">
                                    <div class="d-flex">
                                        <div class="me-auto fst-italic">
                                            Todo #<span class="fw-bold">{{$index+1}}</span>
                                        </div>
                                        <div>
                                            <i class="fa-regular fa-clock"></i> {{intval((abs(strtotime($currentDate) - strtotime($todo->todo_deadline)))/86400)}}d
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $todo->todo_name }}</h5>
                                    <p class="card-text">{{ $todo->todo_note }}</p>
                                    <div class="row">
                                        <div class="col-10 col-md-11">
                                            <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar bg-success" style="width: {{ ($todo->TodoProgress->step_done /  $todo->TodoProgress->step_total * 100) . '%'}}"></div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-1 text-end">
                                            <span>{{ (int)($todo->TodoProgress->step_done /  $todo->TodoProgress->step_total * 100)}}%</span>
                                        </div>
                                    </div>        
                                    <hr>
                                    <div class="row align-items-center">
                                        <div class="col-sm-6">
                                            Task difficulty:
                                            <div>
                                                @for($i=1;$i<=5;$i++)
                                                    @if($i<=$todo->todo_difficulty_level)
                                                        <i class="fa-solid fa-fire text-danger"></i>
                                                    @else
                                                        <i class="fa-solid fa-fire text-secondary"></i>  
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-end d-flex">
                                            <a href="{{url('todo/'.$todo->todo_id)}}" class="btn btn-primary ms-auto">Detail</a>
                                            <button class="ms-2 btn btn-danger" data-todo="{{ $todo->todo_name }}" data-action="{{ url('todo/'.$todo->todo_id) }}" data-bs-toggle="modal" data-bs-target="#modal-confirm-delete">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-3" style="z-index:1000">
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

    window.onscroll = function(element) {
        if(window.pageYOffset >= addDistance)
        {
            console.log('yes');
            $('#addNewButton').removeClass('d-none');
        } else {
            $('#addNewButton').addClass('d-none');
        }
    };

    $('#modal-confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('form').attr('action', $(e.relatedTarget).data('action'));
        $(this).find('#modalBody').html('Are you sure going to remove '+$(e.relatedTarget).data('todo')+'?');
    });
    
</script>
@endsection