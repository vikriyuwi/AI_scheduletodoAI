@extends('../template')

@section('main-content')
<section id="updateinfo">
    <div class="container pt-5">
        <div class="row pt-5">
            <div class="col-md-9 mx-auto">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Task</h2>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="{{ url('/todo/create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> add todo</a>
                    </div>
                </div>
                @if($todos->count() != 0)
                    @foreach ($todos as $index => $todo) 
                    <div class="row p-2">
                        <div class="card col-12 p-0">
                            <div class="card-header">
                                <div class="d-flex">
                                    <div class="me-auto">
                                        Todo
                                    </div>
                                    <div>
                                        <i class="fa-regular fa-clock"></i> {{$todo->todo_deadline}}
                                    </div>
                                </div>
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
                                {{-- <a href="#" class="btn btn-primary">Do task</a> --}}
                                <a href="{{url('todo/'.$todo->todo_id)}}" class="btn btn-primary">Detail</a>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex text-danger">
                                    <div class="me-auto">
                                        Task difficulty:
                                    </div>
                                    <div>
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
        </div>
    </div>
</section>
@endsection