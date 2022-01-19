@extends('layouts.app')
@section('contents')
<h1>Hello {{ Auth::user()->name }}</h1>
@endsection
