@extends('layout.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold">Edit Task</h2>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm mt-2">← Back to List</a>

    @include('tasks.partials.alerts')

    <div class="card shadow-sm mt-3">
        <div class="card-body">
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4">{{ $task->description }}</textarea>
                </div>

                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" name="is_completed" id="is_completed" {{ $task->is_completed ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_completed">Mark as Completed</label>
                </div>

                <button type="submit" class="btn btn-success">Update Task</button>
            </form>
        </div>
    </div>
</div>
@endsection