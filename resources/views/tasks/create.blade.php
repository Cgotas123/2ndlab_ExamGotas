@extends('layout.app') 

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <h2 class="fw-bold">Create New Task</h2>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-sm mt-2">← Back to List</a>
    </div>

    @include('tasks.partials.alerts')

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter task title" value="{{ old('title') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" placeholder="Enter task description" rows="4">{{ old('description') }}</textarea>
                </div>

                <div class="form-check form-switch mb-4">
                    <input class="form-check-input" type="checkbox" name="is_completed" id="is_completed" {{ old('is_completed') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_completed">Mark as Completed</label>
                </div>

                <button type="submit" class="btn btn-success">Create Task</button>
            </form>
        </div>
    </div>
</div>
@endsection