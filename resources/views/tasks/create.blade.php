@extends('layouts.master')

@section('pageTitle', 'Create Task')

@section('main')
  <div class="form-container">
    <h1 class="form-title">Create Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST" class="form">
      @csrf

      <div class="form-item">
        <label>Name:</label>
        <input class="form-input" type="text" name="name" required>
      </div>

      <div class="form-item">
        <label>Detail:</label>
        <textarea class="form-text-area" name="detail" required></textarea>
      </div>

      <div class="form-item">
        <label>Due Date:</label>
        <input class="form-input" type="date" name="due_date" required>
      </div>

      <div class="form-item">
        <label>Progress:</label>
        <select class="form-input" name="status">
          <option value="not_started">Not Started</option>
          <option value="in_progress">In Progress</option>
          <option value="in_review">Waiting/In Review</option>
          <option value="completed">Completed</option>
        </select>
      </div>

      <button type="submit" class="form-button" onclick="showAlert('Task created successfully!')">Submit</button>
    </form>
  </div>
@endsection
