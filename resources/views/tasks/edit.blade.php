@extends('layouts.app')
@section('contents')
<h3>Edit Task</h3>
<hr>
<form class="form-horizontal" action="{{ url("/tasks/$task->id") }}" method="POST">
    @method('put')
    @csrf
    <div class="form-group">
        <label class="control-label col-sm-2">Task Name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{ $task->name }}" placeholder="Enter Task"
                name="task_name">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Category:</label>
        <div class="col-sm-10">
            <select name="category_id" class="form-control">
                <option value="">--Select a Category--</option>
                @foreach ($categories_list as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $task->category_id ? "selected":"" }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Task Details:</label>
        <div class="col-sm-10">
            <textarea name="task_details" cols="30" rows="10" class="form-control">{{ $task->details }}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Task Deadline:</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" value="{{ $task->deadline }}" placeholder="Enter Task Dead Line"
                name="task_deadline">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Status:</label>
        <div class="col-sm-10">
            <select name="task_status" class="form-control">
                <option value="">--Select a Status--</option>
                @foreach ($tasks_status as $value => $key)
                    <option value="{{ $value }}" {{ $task->status == $value ? "selected":"" }}>{{ $key }}</option> // cz, from database their is no chance to come null as a value of status
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Edit</button>
    </div>
    </div>
</form>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection
