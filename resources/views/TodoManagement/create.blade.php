@extends('../template')

@section('main-content')
<div class="modal fade " id="modalMessage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Opps..</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
            </div>
        </div>
    </div>
</div>

<section id="updateinfo">
    <div class="container pt-5">
        <div class="row pt-5">
            <div class="col-md-9 mx-auto">
                <div class="row">
                    <div class="col-md-12">
                        <h2>New todo</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card" id="todoCard">
                            <div class="card-body">
                                <form action="">
                                    @csrf
                                    <label class="mt-2" for="initTodoName">Todo Name:</label>
                                    <input class="form-control" type="text" id="initTodoName" name="todoName">    
                                    <label for="initTodoNote" class="mt-2">Todo Note (optional):</label>
                                    <textarea name="todoNote" id="initTodoNote" rows="5" class="form-control"></textarea>
                                    <label class="mt-2" for="initTodoDeadline">Todo Deadline:</label>
                                    <input class="form-control" type="date" id="initTodoDeadline" name="todoDeadline">           
                                    <label class="mt-2" for="initTodoDifficulty">Todo Difficulty:</label>
                                    <div class="row">
                                        <div class="col-10 col-md-11">
                                            <input type="range" class="form-range" min="0" max="5" id="initTodoDifficulty" name="todoDifficulty"> 
                                        </div>
                                        <div class="col-2 col-md-1 text-end">
                                            <span class="me-2" id="initTodoDifficultyValue">3</span>
                                        </div>
                                    </div>         
                                    <label class="mt-2" for="initTodoSteps">Todo Steps Count:</label>
                                    <input class="form-control" type="number" id="initTodoSteps" name="todoSteps">           
                                    <label class="mt-2" for="initTodoLink">Related Link (optional):</label>
                                    <input class="form-control" type="text" id="initTodoLink" name="todoLink">           
                                    <a class="btn btn-success mt-2" id="submit-button">Submit</a>
                                </form>
                            </div>
                        </div>
                        <div class="card" id="stepCard" style="display: none">
                            <div class="card-body">
                                <form action="{{ url('/todo') }}" method="POST">
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
            $('#modalBody').html('Please fill the todo name')
            modal.show();
            return;
        } else if (todoDeadline === '') {
            $('#modalBody').html('Please fill the todo deadline')
            modal.show();
            return;
        } else if (todoDeadline === '') {
            $('#modalBody').html('Please fill the todo deadline.');
            modal.show();
            return;
        } else if (todoDifficulty < 1) {
            $('#modalBody').html('Valid value for todo difficulty is greater than 0.');
            modal.show();
            return;
        } else if (todoSteps === '' || isNaN(todoSteps) || todoSteps < 1 || todoSteps > 10) {
            $('#modalBody').html('Valid value for todo step is 1 to 10');
            modal.show();
            return;
        } else if (todoLink !== '' &&  !isValidUrl(todoLink)) {
            $('#modalBody').html('Please fill the todo link with valid url');
            modal.show();
            return;
        }

        $('#todoCard').hide();

        var newFormCard = $('#stepCard')
        var newForm = $('form').eq(1);
        newFormCard.show();

        newForm.find('#todoName').val(todoName);
        newForm.find('#todoNote').val(todoNote);
        newForm.find('#todoDeadline').val(todoDeadline);
        newForm.find('#todoDifficulty').val(todoDifficulty);
        newForm.find('#todoSteps').val(todoSteps);
        newForm.find('#todoLink').val(todoLink);

        for (var i = 1; i <= todoSteps; i++) {
            var stepName = $('<label>', {
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
        newForm.append($('<button type="submit">Submit</button>'))
        });
    });
    </script>
@endsection