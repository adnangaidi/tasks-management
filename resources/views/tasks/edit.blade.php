@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <div class="card">
        <div class="card-header">Edit Task</div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Task Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}" required>
                </div>

                <div class="form-group">
                    <label for="priority">Priority:</label>
                    <input type="number" class="form-control" id="priority" name="priority" value="{{ $task->priority }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Task</button>
            </form>
        </div>
    </div>
@endsection
