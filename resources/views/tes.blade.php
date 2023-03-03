<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <header>

    </header>

    <main class="mx-3">
        {{-- add new list --}}
        <div class="addList">
            <h1>
                Add new list:
            </h1>
            <div class="card" id="taskCard">
                <div class="card-body">
                    <form action="submit">
                        @csrf
                        <label for="taskName">Task Name:</label>
                        <input type="text" id="taskName" name="taskName" required><br><br>

                        <label for="taskDeadline">Task Deadline:</label>
                        <input type="date" id="taskDeadline" name="taskDeadline" required><br><br>

                        <label for="taskDifficulty">Task Difficulty:</label>
                        <input type="number" id="taskDifficulty" name="taskDifficulty" min="1" max="10" required><br><br>

                        <label for="taskSteps">Task Steps:</label>
                        <input type="number" id="taskSteps" name="taskSteps" min="1" required><br><br>

                        <button type="submit" id="submit-button">Submit</button>
                    </form>
                </div>
            </div>
            <div class="card" id="stepCard" style="display: none">
                <div class="card-body">
                    <form action="submit">
                        @csrf
                        <input type="hidden" id="taskName" name="taskName">
                        <input type="hidden" id="taskDeadline" name="taskDeadline">
                        <input type="hidden" id="taskDifficulty" name="taskDifficulty">
                        <input type="hidden" id="taskSteps" name="taskSteps">

                        {{-- @for ($i = 1; $i <= $taskSteps; $i++)
                        <label for="stepName{{ $i }}">Step {{ $i }}:</label>
                        <input type="text" id="stepName{{ $i }}" name="stepName{{ $i }}" required><br><br>
                        @endfor --}}
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer>

    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#submit-button').click(function(event) {
        event.preventDefault();
        var taskName = $('#taskName').val();
        var taskDeadline = $('#taskDeadline').val();
        var taskDifficulty = $('#taskDifficulty').val();
        var taskSteps = $('#taskSteps').val();
        $('#taskCard').hide();
        var newFormCard = $('#stepCard')
        var newForm = $('form').eq(1);
        newFormCard.show();
        newForm.find('#taskName').val(taskName);
        newForm.find('#taskDeadline').val(taskDeadline);
        newForm.find('#taskDifficulty').val(taskDifficulty);
        newForm.find('#taskSteps').val(taskSteps);
        for (var i = 1; i <= taskSteps; i++) {
            var stepName = $('<label>', {
            for: 'stepName' + i,
            text: 'Step ' + i + ':'
            }).add($('<input>', {
            type: 'text',
            id: 'stepName' + i,
            name: 'stepName' + i,
            required: true
            }));
            newForm.append(stepName).append('<br><br>');
        }
        newForm.append($('<button type="submit">Submit</button>'))
        });
    });
    </script>
</body>
</html>