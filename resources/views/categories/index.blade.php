@extends('layouts.app')
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
                <a href="{{ url("/categories/{$category->id}/edit") }}" class="btn btn-warning btn-sm">Update</a>
                {{-- <a href="" class="btn btn-danger btn-sm">Delete</a> --}}
                <form action="{{ url("/categories/$category->id") }}" method="POST" onsubmit="return confirm('Do you want to delete this category?');">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
