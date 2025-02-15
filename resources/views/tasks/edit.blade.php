@extends('layouts.master')

@section('pageTitle', $pageTitle)

@section('main')

  <div class="form-container">
    <h1 class="form-title">{{ $pageTitle }}</h1>

    <form class="form" method="POST" action="{{ route('tasks.update', $task->id) }}">
      @csrf
      @method('PUT')

      <div class="form-item">
        <label>Name:</label>
        <input
          class="form-input"
          type="text"
          name="name"
          value="{{ old('name', $task->name) }}"
          required
        >
      </div>

      <div class="form-item">
        <label>Detail:</label>
        <textarea 
          class="form-text-area"
          name="detail"
          required
        >{{ old('detail', $task->detail) }}</textarea>
      </div>

      <div class="form-item">
        <label>Due Date:</label>
        <input
          class="form-input"
          type="date"
          name="due_date"
          value="{{ old('due_date', $task->due_date) }}"
          required
        >
      </div>

      <div class="form-item">
        <label>Progress:</label>
        <select class="form-input" name="status" required>
          <option value="not_started" @if($task->status == 'not_started') selected @endif>Not Started</option>
          <option value="in_progress" @if($task->status == 'in_progress') selected @endif>In Progress</option>
          <option value="in_review" @if($task->status == 'in_review') selected @endif>Waiting/In Review</option>
          <option value="completed" @if($task->status == 'completed') selected @endif>Completed</option>
        </select>
      </div>

      <button type="submit" class="form-button" onclick="showAlert('Task updated successfully!')">Update Task</button>

    </form>

  </div>

@endsection
