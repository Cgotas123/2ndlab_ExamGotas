@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <!-- Card for Task Creation -->
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-info text-white">
                    <h4 class="fw-bold mb-0">Create New Task</h4>
                </div>
                <div class="card-body bg-light">
                    <a href="{{ route('tasks.index') }}" class="btn btn-outline-primary btn-sm mb-3">← Back to List</a>

                    @include('tasks.partials.alerts')

                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf

                        <!-- Title Input -->
                        <div class="mb-4">
                            <label for="title" class="form-label text-info">Task Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter task title" value="{{ old('title') }}" required>
                        </div>

                        <!-- Description Input -->
                        <div class="mb-4">
                            <label for="description" class="form-label text-info">Task Description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Enter task description" rows="4">{{ old('description') }}</textarea>
                        </div>

                        <!-- Task Completion Checkbox -->
                        <div class="mb-4 form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_completed" id="is_completed" {{ old('is_completed') ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_completed">Mark as Completed</label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-info w-100">Create Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
