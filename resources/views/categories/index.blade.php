@extends('layouts.app')
@section('nav_status_category','class = active')
@section('contents')
<a href="{{ url('/categories/create') }}" class="btn btn-success">Add New Category</a>
<hr>
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Action</th>
    </tr>
    @foreach ($category_list as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>
                <a href="" class="btn btn-warning btn-sm">Update</a>
                <a href="" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
    @endforeach
</table>
@endsection
