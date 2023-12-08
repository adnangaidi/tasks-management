@extends('layouts.app')

@section('title', 'Task Management')

@section('content')
    <div class="card">
        <div class="card-header">Task List</div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <ul id="taskList" class="list-group">
                @forelse($tasks as $task)
                    <li class="list-group-item" data-id="{{ $task->id }}">
                        {{ $task->name }}
                        @if($task->project)
                            <span class="badge badge-primary">{{ $task->project->name }}</span>
                        @endif
                        <span class="float-right">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('tasks.delete', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </span>
                    </li>
                @empty
                    <p>No tasks available.</p>
                @endforelse
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

    <script>
        const taskList = document.getElementById('taskList');

        new Sortable(taskList, {
            animation: 150,
            onEnd: function (evt) {
                const taskOrder = Array.from(taskList.children).map((item) => item.dataset.id);

                fetch('/task/reorder', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ taskOrder }),
                })
                .then(response => response.json())
                .then(data => console.log(data))
                .catch(error => console.error(error));
            },
        });
    </script>
@endsection
