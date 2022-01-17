@extends('layouts.app')
@section('nav_status_category','class = active')
@section('contents')
<h3>Add new Category</h3>
<hr>
<form class="form-horizontal" action="{{ url('/categories') }}" method="POST">
    @csrf
    <div class="form-group">
        <label class="control-label col-sm-2">Category Name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{ old('category_name') }}" placeholder="Enter Category"
                name="category_name">
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
