<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <title>Task List</title>
  <style>
    /* Neo Brutalism Styles */
    body {
      background-color: #f0f0f0;
      font-family: 'Inter', sans-serif;
    }
    .container {
      border: 2px solid #000;
      box-shadow: 10px 10px 0 #000;
    }
    .form-button, .task-list-button {
      background-color: #ffcc00;
      border: 2px solid #000;
      transition: transform 0.2s;
    }
    .form-button:hover, .task-list-button:hover {
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <div class="task-list-container">
    <h1 class="task-list-heading">Task List</h1>
    <div class="task-list-table-head">
      <div class="task-list-header-task-name">Task Name</div>
      <div class="task-list-header-detail">Detail</div>
      <div class="task-list-header-due-date">Due Date</div>
      <div class="task-list-header-progress">Progress</div>
    </div>
    @foreach ($tasks as $index => $task)
      <div class="table-body">
        <div class="table-body-task-name">
          <span class="material-icons @if ($task->status == 'completed') check-icon-completed @else check-icon @endif">
            check_circle
          </span>
          {{ $task->name }}
        </div>
        <div class="table-body-detail"> {{ $task->detail }} </div>
        <div class="table-body-due-date"> {{ $task->due_date }} </div>
        <div class="table-body-progress">
          @switch($task->status)
            @case('in_progress')
              In Progress
              @break
            @case('in_review')
              Waiting/In Review
              @break
            @case('completed')
              Completed
              @break
            @default
              Not Started
          @endswitch
        </div>
      </div>
    @endforeach
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function showAlert(message) {
      Swal.fire({
        title: 'Alert',
        text: message,
        icon: 'info',
        confirmButtonText: 'OK'
      });
    }
  </script>
</body>
</html>