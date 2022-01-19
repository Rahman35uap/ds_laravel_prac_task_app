@extends('layouts.app')
@section('contents')
<h3>Edit Category</h3>
<hr>
<form class="form-horizontal" action="{{ url("/categories/$category->id") }}" method="POST">
    @method('put')
    @csrf
    <div class="form-group">
        <label class="control-label col-sm-2">Category Name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="{{ $category->name }}" placeholder="Enter Category"
                name="category_name">
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
