@extends('layouts.app')
@section('contents')
<h3>Add new Category</h3>
<hr>
<form class="form-horizontal" action="{{ url('/tasks') }}" method="POST">
    @csrf
    <div class="form-group">
        <label class="control-label col-sm-2">Task Name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{ old('task_name') }}" placeholder="Enter Task Name"
                name="task_name">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Category:</label>
        <div class="col-sm-10">
            <select name="category_id" class="form-control">
                <option value="">--Select a Category--</option>
                @foreach ($categories_list as $category)
                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? "selected":"" }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Task Details:</label>
        <div class="col-sm-10">
            <textarea name="task_details" cols="30" rows="10" class="form-control">{{ old('task_details') }}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Task Deadline:</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" value="{{ old('task_deadline') }}" placeholder="Enter Task Dead Line"
                name="task_deadline">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Status:</label>
        <div class="col-sm-10">
            <select name="task_status" class="form-control">
                <option value="">--Select a Status--</option>
                @foreach ($tasks_status as $value => $key)
                    <option value="{{ $value }}" {{ old('task_status') == strval($value) ? "selected":"" }}>{{ $key }}</option>
                    {{-- on php,
                    $a = null == $b = 0    => Matched
                    $a = null == $b = "0"  => NOT matched
                   $a = null === $b = 0    => NOT matched
                    $a = null === $b = "0"  => NOT matched
                                      $a = 0 == $b = 0      => Matched
                                      $a = 0 == $b = "0"  =>Matched
                                      $a = 0 === $b = 0   =>Matched
                                      $a = 0 === $b ="0"  => NOT matched --}}
                @endforeach
            </select>
        </div>
    </div>
    
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">ADD</button>
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
