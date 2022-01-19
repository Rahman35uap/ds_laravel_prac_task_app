@extends('layouts.app')
@section('contents')
<a href="{{ url('/tasks/create') }}" class="btn btn-success">Add New Task</a>
<hr>
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Category</th>
        <th>Details</th>
        <th>Status</th>
        <th>Deadline</th>
        <th>Action</th>
    </tr>
    @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->name }}</td>
            <td>{{ $task->category->name }}</td>
            <td>{{ $task->details }}</td>
            <td>{{ App\Enums\TaskStatus::getDescription($task->status) }}</td>
            <td>{{ $task->deadline }}</td>
            <td>
                <a href="{{ url("/tasks/{$task->id}/edit") }}" class="btn btn-warning btn-sm">Update</a>
                <form action="{{ url("/tasks/$task->id") }}" method="POST" onsubmit="return confirm('Do you want to delete this task?');">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection