@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <div class="card">
        <div class="card-header">Create Task</div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('tasks.store') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Task Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="priority">Priority:</label>
                    <input type="number" class="form-control" id="priority" name="priority" required>
                </div>

                <div class="form-group">
                    <label for="project_id">Project:</label>
                    <select class="form-control" id="project_id" name="project_id">
                        <option value="" selected>Select Project</option>
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Create Task</button>
            </form>
        </div>
    </div>
@endsection
