@extends('layouts.app')
@section('nav_content_dashboard','DASHBOARD')
@section('nav_status_dashboard',"class = active")
@section('contents')
<h1>Hello {{ Auth::user()->name }}</h1>
@endsection
