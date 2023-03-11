@extends('../template')

@section('main-content')
{{-- error modal --}}
<div class="modal fade " id="modalMessage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Opps..</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
            </div>
        </div>
    </div>
</div>
{{-- edit modal --}}
<div class="modal fade" id="modal-todo-edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Opps..</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">
                <form action="{{ url('todo/'.$todo->todo_id) }}" method="post" class="ms-2" onsubmit="showLoadingScreen()">
                    @method('PUT')
                    @csrf
                    <div class="mb-2">
                        <label class="mt-2" for="initTodoName">Todo Name:</label>
                        <input class="form-control" type="text" id="initTodoName" name="todoName" value="{{$todo->todo_name}}">
                    </div>
                    <div class="mb-2">
                        <label for="initTodoNote" class="mt-2">Todo Note (optional):</label>
                        <textarea name="todoNote" id="initTodoNote" rows="5" class="form-control">{{$todo->todo_note}}</textarea>
                    </div>
                    <div class="mb-2">
                        <label class="mt-2" for="initTodoDeadline">Todo Deadline:</label>
                        <input class="form-control" type="date" id="initTodoDeadline" name="todoDeadline" value="{{substr($todo->todo_deadline,0,-9)}}">
                    </div>
                    <div class="mb-2">      
                        <label class="mt-2" for="initTodoDifficulty">Todo Difficulty:</label>
                        <div class="row">
                            <div class="col-10 col-md-11">
                                <input type="range" class="form-range" min="0" max="5" id="initTodoDifficulty" name="todoDifficulty" value="{{$todo->todo_difficulty_level}}"> 
                            </div>
                            <div class="col-2 col-md-1 text-end">
                                <span class="me-2" id="initTodoDifficultyValue">{{$todo->todo_difficulty_level}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="mt-2" for="initTodoLink">Related Link (optional):</label>
                        <input class="form-control" type="text" id="initTodoLink" name="todoLink" value="{{ $todo->todo_link }}">
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- modal add step --}}
<div class="modal fade" id="modal-add-step" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Add new step</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">
                <form action="{{ url('step') }}" method="post" class="ms-2" onsubmit="showLoadingScreen()">
                    @method('POST')
                    @csrf
                    <input type="hidden" name="todoId" value="{{ $todo->todo_id }}">
                    <div class="mb-2">
                        <label class="mt-2" for="stepName">Step Name:</label>
                        <input class="form-control" type="text" id="stepName" name="stepName">
                    </div>
                    <div class="mb-2">
                        <label for="stepDetail" class="mt-2">Step Detail (optional):</label>
                        <textarea name="stepDetail" id="stepDetail" rows="5" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">add new step</button>
                </form>
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
    <div class="container pt-5">
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
            <div class="col-12">
                <div class="row p-1">
                    <div class="col-md-8">
                        <h2 class="fw-bold">{{$todo->todo_name}} detailed steps</h2>
                        <div class="text-warning">
                            @for($i=1;$i<=5;$i++)
                                @if($i<=$todo->todo_difficulty_level)
                                    <i class="fa-solid fa-star"></i>
                                @else
                                    <i class="fa-regular fa-star"></i>   
                                @endif
                            @endfor
                        </div>
                        @csrf
                    </div>
                    <div class="col-md-4 text-start text-md-end">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-todo-edit"><i class="fa-solid fa-pen-to-square"></i></button>
                        <a href="{{ url('todo/') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left-long"></i> back</a>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="card p-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <p>{{ $todo->todo_note }}</p>
                                    <span>must be done at <b>{{substr($todo->todo_deadline,0,-9)}}</b>
                                    </span><br>
                                    
                                    @if ($todo->todo_link != null)
                                        <a href="{{$todo->todo_link}}" class="link link-primary fw-bold" target="_blank">Go todo link </a>                                
                                    @endif
                                </div>
                                <div class="col-md-3 text-start text-md-end">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add-step"><i class="fa-solid fa-plus"></i> add step</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card-group card-group-scroll scrollable">
                    <div class="card status-card" id="TODOCard" ondrop="drop(event)" ondragover="allowDrop(event)">
                        <div class="card-body rounded border border-secondary">
                            <h5 class="card-title">
                                <i class="fa-regular fa-circle-dot"></i> Todo
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Steps that waiting to be done goes here.
                            </h6>
                            @foreach($steps as $step)
                                @if($step->step_status=='TODO')
                                    <div class="card step-card mb-3 p-2" id="step{{$step->step_id}}" data-step-id = "{{$step->step_id}}" draggable="true" ondragstart="drag(event)" ondrop="dropChild(event)">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="card-title">
                                                    {{$step->step_name}}
                                                </h5>
                                                @if($step->step_detail != null)
                                                    <h6 class="card-subtitle fw-light fst-italic text-muted">
                                                        {{$step->step_detail}}
                                                    </h6>
                                                @endif
                                            </div>
                                            <div class="ms-auto ps-2">
                                                <button class="btn btn-outline-danger" data-step="{{ $step->step_name }}" data-action="{{ url('step/'.$step->step_id) }}" data-bs-toggle="modal" data-bs-target="#modal-confirm-delete"><i class="fa-regular fa-trash-can"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="card status-card" id="ONPROGRESSCard" ondrop="drop(event)" ondragover="allowDrop(event)">
                        <div class="card-body rounded border border-secondary">
                            <h5 class="card-title">
                                <i class="fa-regular fa-circle-play text-primary"></i> On progress
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Steps that being done partially goes here.
                            </h6>
                            @foreach($steps as $step)
                                @if($step->step_status=='ON PROGRESS')
                                    <div class="card step-card mb-3 p-2" id="step{{$step->step_id}}" data-step-id = "{{$step->step_id}}" draggable="true" ondragstart="drag(event)" ondrop="dropChild(event)">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="card-title">
                                                    {{$step->step_name}}
                                                </h5>
                                                @if($step->step_detail != null)
                                                    <h6 class="card-subtitle fw-light fst-italic text-muted">
                                                        {{$step->step_detail}}
                                                    </h6>
                                                @endif
                                            </div>
                                            <div class="ms-auto ps-2">
                                                <button class="btn btn-outline-danger" data-step="{{ $step->step_name }}" data-action="{{ url('step/'.$step->step_id) }}" data-bs-toggle="modal" data-bs-target="#modal-confirm-delete"><i class="fa-regular fa-trash-can"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="card status-card" id="DONECard" ondrop="drop(event)" ondragover="allowDrop(event)">
                        <div class="card-body rounded border border-secondary">
                            <h5 class="card-title">
                                <i class="fa-regular fa-circle-check text-success"></i> Done
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Finished steps goes here.
                            </h6>
                            @foreach($steps as $step)
                                @if($step->step_status=='DONE')
                                    <div class="card step-card mb-3 p-2" id="step{{$step->step_id}}" data-step-id = "{{$step->step_id}}" draggable="true" ondragstart="drag(event)" ondrop="dropChild(event)">
                                        <div class="d-flex">
                                            <div>
                                                <h5 class="card-title">
                                                    {{$step->step_name}}
                                                </h5>
                                                @if($step->step_detail != null)
                                                    <h6 class="card-subtitle fw-light fst-italic text-muted">
                                                        {{$step->step_detail}}
                                                    </h6>
                                                @endif
                                            </div>
                                            <div class="ms-auto ps-2">
                                                <button class="btn btn-outline-danger" data-step="{{ $step->step_name }}" data-action="{{ url('step/'.$step->step_id) }}" data-bs-toggle="modal" data-bs-target="#modal-confirm-delete"><i class="fa-regular fa-trash-can"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('additionalScript')

{{-- drag and drop script --}}
<script>
    // delete step
    $('#modal-confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('form').attr('action', $(e.relatedTarget).data('action'));
        console.log($(this).find('modalBody'));
        $(this).find('#modalBody').html('Are you sure going to remove '+$(e.relatedTarget).data('step')+'?');
    });

    var formTodoEdit = $('#modal-todo-edit form');

    var step_id;
    var step_status_current;
    var step_status;
    var todo_id = "<?= $todo->todo_id ?>";

    function allowDrop(ev) {
      ev.preventDefault();
    }
    
    function drag(ev) {
      ev.dataTransfer.setData("text", ev.target.id);
      step_id = ev.target.dataset.stepId;
      step_status_current = ev.target.parentElement.parentElement.id;
    }
    
    function drop(ev) {
        
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");

        var step_status_box;
        if(ev.target.parentElement.className === "card status-card") {
            step_status_box = ev.target;
        }else if(ev.target.parentElement.className === "card-body rounded border border-secondary"){
            step_status_box = ev.target.parentElement;
        }else{
            step_status_box = ev.target.parentElement.parentElement; 
        }

        step_status_box.appendChild(document.getElementById(data));


        switch (step_status_box.parentElement.id) {
            case "TODOCard":
                step_status = "TODO"
                break;
            case "ONPROGRESSCard":
                step_status = "ON PROGRESS"
                break;
            case "DONECard":
                step_status = "DONE"
                break;
            default:
                step_status = ev.target.parentElement.id;
                break;
        }

        if(step_status_current !== step_status_box.parentElement.id) {
            showLoadingScreen();

            var params = {
                'todo_id':todo_id,
                'step_id':step_id,
                'step_status':step_status
            }
            // const path = "{{ url('/todo/'.$todo->todo_id.'/update-step-status') }}";
            const path = "{{ url('/todo/update-step-status') }}";
            pagePost(path,params);
        }

    }

    function dropChild(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");

        if(ev.target.parentElement.className === "card step-card") {
            ev.target.parentElement.parentElement.appendChild(document.getElementById(data));  
        }
    }

    function showLoadingScreen()
    {
        $('#main').addClass('d-none');
        $('#loading-screen').removeClass('d-none');
    }

    var todoDifficultySlider = $('#initTodoDifficulty');
    todoDifficultySlider[0].addEventListener("input", ()=> {
        let value = parseInt(todoDifficultySlider[0].value);
        $('#initTodoDifficultyValue').html(value);
    });

    </script>
    @if ($errors->any())
    <script>
        var modalMessage = new bootstrap.Modal('#modalMessage');
        modalMessage.show();
    </script>
    @endif
@endsection