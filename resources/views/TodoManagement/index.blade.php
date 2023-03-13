@extends('../template')

@section('main-content')
{{-- add modal --}}
<div class="modal fade" id="modal-todo-add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Add new todo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">
                <div id="todoCard">
                    <form action="" class="ms-2">
                        @csrf
                        <div class="mb-2">
                            <label class="mt-2" for="initTodoName">Todo Name:</label>
                            <input class="form-control" type="text" id="initTodoName" name="todoName" required>
                        </div>
                        <div class="mb-2">
                            <label for="initTodoNote" class="mt-2">Todo Note (optional):</label>
                            <textarea name="todoNote" id="initTodoNote" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="mb-2">
                            <label class="mt-2" for="initTodoDeadline">Todo Deadline:</label>
                            <input class="form-control" type="date" id="initTodoDeadline" name="todoDeadline" required>
                        </div>
                        <div class="mb-2">      
                            <label class="mt-2" for="initTodoDifficulty">Todo Difficulty:</label>
                            <div class="row">
                                <div class="col-10 col-md-11">
                                    <input type="range" class="form-range" min="0" max="5" id="initTodoDifficulty" name="todoDifficulty"> 
                                </div>
                                <div class="col-2 col-md-1 text-end">
                                    <span class="me-2" id="initTodoDifficultyValue"></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="todoSteps">Todo steps:</label>
                            <input type="number" name="todoSteps" id="initTodoSteps" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label class="mt-2" for="initTodoLink">Related Link (optional):</label>
                            <input class="form-control" type="text" id="initTodoLink" name="todoLink">
                        </div>
                        <a class="btn btn-success mt-4 rounded-pill" id="submit-button">Next</a>
                    </form>
                </div>
                <div id="stepCard" style="display: none">
                    <form action="{{ url('/todo') }}" method="POST" onsubmit="showLoadingScreen()">
                        @method('POST')
                        @csrf
                        <input type="hidden" id="todoName" name="todoName">
                        <input type="hidden" name="todoNote" id="todoNote">
                        <input type="hidden" id="todoDeadline" name="todoDeadline">
                        <input type="hidden" class="form-range" id="todoDifficulty" name="todoDifficulty"> 
                        <input type="hidden" id="todoSteps" name="todoSteps">
                        <input type="hidden" id="todoLink" name="todoLink">  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- modal message --}}
<div class="modal fade " id="modalMessage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Opps..</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBodyTodoAdd">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
            </div>
        </div>
    </div>
</div>
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
<section id="main">
    <div class="container">
        @if (session('message'))
        <div class="row mt-5">
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
        </div>
        @endif
        <div class="row">
            <div class="col-md-9 p-md-5 rounded-5 bg-body">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="">Hi,<br>{{ $userData->user_name }}</h1>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <button class="btn btn-success rounded-pill" id="addNewButtonPrimary" data-bs-toggle="modal" data-bs-target="#modal-todo-add"><i class="fa-solid fa-plus"></i> add todo</button>
                    </div>
                </div>
                {{-- priority todo --}}
                @if($prioritytodos->count() != 0)
                    <div class="card mt-4 border-0 rounded-5 bg-primary text-white">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="fw-bold">Priority to be done</h3>
                                    <p>Get ready to level up your productivity game and flaunt your smarts!<br><b>Starting off with our recommendations</b> is the smartest move you'll make today!</p>
                                </div>
                            </div>
                            <div class="row pt-3">
                            @foreach ($prioritytodos as $index => $todo)
                            <div class="col-lg-6 col-xl-6 col-xxl-4 mb-3">
                                <div class="card p-md-2 border-0 rounded-4 h-100 bg-body text-dark">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="d-flex">
                                                <div class="me-auto fst-italic">
                                                    Todo #<span class="fw-bold">{{$index+1}}</span>
                                                </div>
                                                <div>
                                                    <i class="fa-regular fa-clock"></i> {{intval((abs(strtotime($currentDate) - strtotime($todo->todo_deadline)))/86400)}}d
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="card-title fw-bold">{{ $todo->todo_name }}</h5>
                                        <p class="card-text">{{ substr($todo->todo_note,0,24) }}{{ strlen($todo->todo_note) > 24 ? '...' : '' }}</p>
                                    </div>
                                    <div class="card-footer border-0 bg-body rounded-4 pt-0 py-4">
                                        <div class="row">
                                            <div class="col-9 col-md-8 col-xxl-8 d-flex align-items-center">
                                                <div class="progress rounded-pill col-12" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar bg-success rounded-pill" style="width: {{ ($todo->TodoProgress->step_done /  $todo->TodoProgress->step_total * 100) . '%'}}"></div>
                                                </div>
                                            </div>
                                            <div class="col-3 col-md-4 col-xxl-4 text-end">
                                                <span>{{ (int)($todo->TodoProgress->step_done /  $todo->TodoProgress->step_total * 100)}}%</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row align-items-center">
                                            <div class="col">
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
                                            <div class="col text-end d-lg-flex">
                                                <a href="{{url('todo/'.$todo->todo_id)}}" class="btn btn-primary rounded-pill ms-xxl-auto mt-2 mt-xxl-0"><i class="fa-solid fa-ellipsis"></i></a>
                                                <button class="ms-2 btn btn-danger rounded-pill mt-2 mt-xxl-0" data-todo="{{ $todo->todo_name }}" data-action="{{ url('todo/'.$todo->todo_id) }}" data-bs-toggle="modal" data-bs-target="#modal-confirm-delete">
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
                    </div>
                    @if($nonprioritytodos->count() != 0)
                    <div class="card mt-4 border-0 rounded-5 bg-trans-secondary">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="fw-bold">Other todo</h3>
                                    <p>Psst! I know our recommended task list is awesome,<br><b>but don't leave your other to-dos hanging!</b> Give them some love too</p>
                                </div>
                            </div>
                            <div class="row pt-3">
                            @foreach ($nonprioritytodos as $index => $todo)
                            <div class="col-lg-6 col-xl-6 col-xxl-4 mb-3">
                                <div class="card p-md-2 border-0 rounded-4 h-100 bg-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="d-flex">
                                                <div class="me-auto fst-italic">
                                                    Todo #<span class="fw-bold">{{$index+1}}</span>
                                                </div>
                                                <div>
                                                    <i class="fa-regular fa-clock"></i> {{intval((abs(strtotime($currentDate) - strtotime($todo->todo_deadline)))/86400)}}d
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="card-title fw-bold">{{ $todo->todo_name }}</h5>
                                        <p class="card-text">{{ substr($todo->todo_note,0,24) }}{{ strlen($todo->todo_note) > 24 ? '...' : '' }}</p>
                                    </div>
                                    <div class="card-footer border-0 bg-body rounded-4 pt-0 py-4">
                                        <div class="row">
                                            <div class="col-9 col-md-8 col-xxl-8 d-flex align-items-center">
                                                <div class="progress rounded-pill col-12" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar bg-success rounded-pill" style="width: {{ ($todo->TodoProgress->step_done /  $todo->TodoProgress->step_total * 100) . '%'}}"></div>
                                                </div>
                                            </div>
                                            <div class="col-3 col-md-4 col-xxl-4 text-end">
                                                <span>{{ (int)($todo->TodoProgress->step_done /  $todo->TodoProgress->step_total * 100)}}%</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row align-items-center">
                                            <div class="col">
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
                                            <div class="col text-end d-lg-flex">
                                                <a href="{{url('todo/'.$todo->todo_id)}}" class="btn btn-primary rounded-pill ms-xxl-auto mt-2 mt-xxl-0"><i class="fa-solid fa-ellipsis"></i></a>
                                                <button class="ms-2 btn btn-danger rounded-pill mt-2 mt-xxl-0" data-todo="{{ $todo->todo_name }}" data-action="{{ url('todo/'.$todo->todo_id) }}" data-bs-toggle="modal" data-bs-target="#modal-confirm-delete">
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
                <div class="card mt-4 border-0 rounded-5 bg-trans-success">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="fw-bold">Awesome!</h3>
                                <p>Woo-hoo! You're crushing it! You've tackled that to-do list like a boss<br><b>Keep up the awesome work,</b> and let's show those tasks who's boss!</p>
                            </div>
                        </div>
                        <div class="row pt-3">
                        @foreach ($donetodos as $index => $todo)
                        <div class="col-lg-6 col-xl-6 col-xxl-4 mb-3">
                            <div class="card p-md-2 border-0 rounded-5 h-100 bg-body">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="d-flex">
                                            <div class="me-auto fst-italic">
                                                Todo #<span class="fw-bold">{{$index+1}}</span>
                                            </div>
                                            <div>
                                                <i class="fa-regular fa-clock"></i> {{intval((abs(strtotime($currentDate) - strtotime($todo->todo_deadline)))/86400)}}d
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="card-title fw-bold">{{ $todo->todo_name }}</h5>
                                    <p class="card-text">{{ substr($todo->todo_note,0,24) }}{{ strlen($todo->todo_note) > 24 ? '...' : '' }}</p>
                                </div>
                                <div class="card-footer border-0 bg-body rounded-4 pt-0 py-4">
                                    <div class="row">
                                        <div class="col-9 col-md-8 col-xxl-8 d-flex align-items-center">
                                            <div class="progress rounded-pill col-12" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar bg-success rounded-pill" style="width: {{ ($todo->TodoProgress->step_done /  $todo->TodoProgress->step_total * 100) . '%'}}"></div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-md-4 col-xxl-4 text-end">
                                            <span>{{ (int)($todo->TodoProgress->step_done /  $todo->TodoProgress->step_total * 100)}}%</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row align-items-center">
                                        <div class="col">
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
                                        <div class="col text-end d-lg-flex">
                                            <a href="{{url('todo/'.$todo->todo_id)}}" class="btn btn-primary rounded-pill ms-xxl-auto mt-2 mt-xxl-0"><i class="fa-solid fa-ellipsis"></i></a>
                                            <button class="ms-2 btn btn-danger rounded-pill mt-2 mt-xxl-0" data-todo="{{ $todo->todo_name }}" data-action="{{ url('todo/'.$todo->todo_id) }}" data-bs-toggle="modal" data-bs-target="#modal-confirm-delete">
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
                </div>
                @endif
                {{-- todo done --}}
                @if($notdonetodos->count() != 0)
                <div class="card mt-4 border-0 rounded-5 bg-trans-danger">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="fw-bold">Oh no!</h3>
                                <p>Don't feel too disheartened! <br><b>Tomorrow is another chance to make your dreams a reality.</b> Keep your chin up and let's make the most of what's left of today!</p>
                            </div>
                        </div>
                        <div class="row pt-3">
                        @foreach ($notdonetodos as $index => $todo)
                        <div class="col-lg-6 col-xl-6 col-xxl-4 mb-3">
                            <div class="card p-md-2 border-0 rounded-4 h-100 bg-body">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="d-flex">
                                            <div class="me-auto fst-italic">
                                                Todo #<span class="fw-bold">{{$index+1}}</span>
                                            </div>
                                            <div>
                                                <i class="fa-regular fa-clock"></i> {{intval((abs(strtotime($currentDate) - strtotime($todo->todo_deadline)))/86400)}}d
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="card-title fw-bold">{{ $todo->todo_name }}</h5>
                                    <p class="card-text">{{ substr($todo->todo_note,0,24) }}{{ strlen($todo->todo_note) > 24 ? '...' : '' }}</p>
                                </div>
                                <div class="card-footer border-0 bg-body rounded-4 pt-0 py-4">
                                    <div class="row">
                                        <div class="col-9 col-md-8 col-xxl-8 d-flex align-items-center">
                                            <div class="progress rounded-pill col-12" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar bg-success rounded-pill" style="width: {{ ($todo->TodoProgress->step_done /  $todo->TodoProgress->step_total * 100) . '%'}}"></div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-md-4 col-xxl-4 text-end">
                                            <span>{{ (int)($todo->TodoProgress->step_done /  $todo->TodoProgress->step_total * 100)}}%</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row align-items-center">
                                        <div class="col">
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
                                        <div class="col text-end d-lg-flex">
                                            <a href="{{url('todo/'.$todo->todo_id)}}" class="btn btn-primary rounded-pill ms-xxl-auto mt-2 mt-xxl-0"><i class="fa-solid fa-ellipsis"></i></a>
                                            <button class="ms-2 btn btn-danger rounded-pill mt-2 mt-xxl-0" data-todo="{{ $todo->todo_name }}" data-action="{{ url('todo/'.$todo->todo_id) }}" data-bs-toggle="modal" data-bs-target="#modal-confirm-delete">
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
                </div>
                @endif
            </div>
            <div class="col-md-3" style="z-index:1000">
                <div class="row sticky-top">
                    <div class="col-12 p-5">
                        <a href="{{ url('/todo/create') }}" class="btn my-5 btn-success rounded-pill d-none" id="addNewButton"><i class="fa-solid fa-plus"></i> add todo</a>
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
    const modal = new bootstrap.Modal('#modalMessage');

    let todoDifficultySlider = $('#initTodoDifficulty');
    let todoDifficultyValue = $('#initTodoDifficultyValue');

    todoDifficultySlider[0].addEventListener("input", ()=> {
        let value = parseInt(todoDifficultySlider[0].value);
        $('#initTodoDifficultyValue').html(value);
    });

    todoDifficultySlider.oninput = function() {
        value.todoDifficultyValue = this.value;
    }

    const isValidUrl = urlString=> {
	  	var urlPattern = new RegExp('^(https?:\\/\\/)?'+ // validate protocol
	    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // validate domain name
	    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // validate OR ip (v4) address
	    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // validate port and path
	    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // validate query string
	    '(\\#[-a-z\\d_]*)?$','i'); // validate fragment locator
	    return !!urlPattern.test(urlString);
	}

    $(document).ready(function() {
        $('#submit-button').click(function(event) {
        event.preventDefault();
        var todoName = $('#initTodoName').val();
        var todoNote = $('#initTodoNote').val();
        var todoDeadline = $('#initTodoDeadline').val();
        var todoDifficulty = $('#initTodoDifficulty').val();
        var todoSteps = $('#initTodoSteps').val();
        var todoLink = $('#initTodoLink').val();

        if (todoName === '') {
            $('#modalBodyTodoAdd').html('Please fill the todo name')
            modal.show();
            return;
        } else if (todoDeadline === '') {
            $('#modalBodyTodoAdd').html('Please fill the todo deadline')
            modal.show();
            return;
        } else if (todoDeadline === '') {
            $('#modalBodyTodoAdd').html('Please fill the todo deadline.');
            modal.show();
            return;
        } else if (todoDifficulty < 1) {
            $('#modalBodyTodoAdd').html('Valid value for todo difficulty is greater than 0.');
            modal.show();
            return;
        } else if (todoSteps === '' || isNaN(todoSteps) || todoSteps < 1 || todoSteps > 10) {
            $('#modalBodyTodoAdd').html('Valid value for todo step is 1 to 10');
            modal.show();
            return;
        } else if (todoLink !== '' &&  !isValidUrl(todoLink)) {
            $('#modalBodyTodoAdd').html('Please fill the todo link with valid url');
            modal.show();
            return;
        }

        $('#todoCard').hide();

        var newFormCard = $('#stepCard')
        var newForm = $('form').eq(1);
        
        newFormCard.show();newFormCard.show();

        newForm.find('#todoName').val(todoName);
        newForm.find('#todoNote').val(todoNote);
        newForm.find('#todoDeadline').val(todoDeadline);
        newForm.find('#todoDifficulty').val(todoDifficulty);
        newForm.find('#todoSteps').val(todoSteps);
        newForm.find('#todoLink').val(todoLink);

        for (var i = 1; i <= todoSteps; i++) {
            var stepName = $('<label>', {
            class:"mt-4 mb-2 lbl-newForm",
            for: 'stepName',
            text: 'Step ' + i + ':'
            }).add($('<input>', {
            class: 'form-control',
            type: 'text',
            id: 'stepName' + i,
            name: 'stepName[]',
            placeholder: 'Step name',
            required: true
            }));
            var stepDesc = $('<textarea>', {
            class: 'form-control',
            id: 'stepDesc' + i,
            name: 'stepDesc[]',
            placeholder: 'Step description',
            style: 'height: 100px'
            });
            newForm.append(stepName).append(stepDesc);
        }
        newForm.append($('<button class="btn btn-success rounded-pill mt-4" type="submit" id="newSubmitButton">Submit</button>'));
        newForm.append($('<a class="btn btn-secondary rounded-pill ms-2 mt-4" id="backToAddTodo">Back</a>'));

        $('#backToAddTodo').click(function(event) {
            $('#todoCard').show();
            $('#stepCard').hide();
            $('#newSubmitButton').remove();
            $('#backToAddTodo').remove();
            $('.lbl-newForm').remove();
            $('input[name="stepName[]"]').remove();
            $('textarea[name="stepDesc[]"]').remove();
        });

        });
        
    });
</script>
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