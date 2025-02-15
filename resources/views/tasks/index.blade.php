@extends('layouts.master')

@section('pageTitle', $pageTitle)

@section('main')
<div class="task-list-container">
    <h1 class="task-list-heading">Task List</h1>

    <div class="task-list-task-buttons">
      <a href="{{ route('tasks.create') }}">
        <button  class="task-list-button">
          <span class="material-icons">add</span>Add task
        </button>
      </a>
    </div>
    
    <div class="task-cards">
        @foreach ($tasks as $index => $task)
            <div class="task-card">
                <div class="task-card-header">
                    <span class="material-icons {{ $task->status == 'completed' ? 'check-icon-completed' : 'check-icon' }}">
                        check_circle
                    </span>
                    <span class="task-card-title">{{ $task->name }}</span>
                </div>
                <div class="task-card-body">
                    <p><strong>Detail:</strong> {{ $task->detail }}</p>
                    <p><strong>Due Date:</strong> {{ $task->due_date }}</p>
                    <p><strong>Progress:</strong> 
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
                    </p>
                </div>
                <div class="task-card-footer">
                    <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="task-card-edit">Edit</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
