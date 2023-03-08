@extends('../template')

@section('main-content')
    <div class="container-fluid py-2">
        <h2 class="font-weight-light">{{$todo->todo_name}} detail page</h2>
        <div class="card-group card-group-scroll scrollable">
            <div class="card card-body">Card</div>
            <div class="card card-body">Card</div>
            <div class="card card-body">Card</div>
        </div>
    </div>
@endsection