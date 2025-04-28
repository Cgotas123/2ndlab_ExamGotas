@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <h2 class="fw-bold text-primary">Task Management</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-lg">+ Add New Task</a>
    </div>

    @include('tasks.partials.alerts')

    <div class="row">
        <!-- Card for task summary -->
        <div class="col-md-12 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-center">Your Tasks</h5>
                    <p class="text-muted text-center">Manage and track your tasks here</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tasks as $task)
                                    <tr>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ Str::limit($task->description, 50) }}</td>
                                        <td>
                                            @if ($task->is_completed)
                                                <span class="badge bg-success">Completed</span>
                                            @else
                                                <span class="badge bg-secondary">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure to delete?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">No tasks found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
