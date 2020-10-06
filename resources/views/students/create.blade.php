@extends('adminlte::page')

@section('title', 'Add Student')

@section('content_header')
    <h1>Add student</h1>
@stop

@section('plugins.JsValidation', true)
@section('plugins.DateTimePicker', true)

@section('content')
    <form action="{{ route($routePrefix . '.store') }}" class="form-horizontal" id="form" method="post" enctype="multipart/form-data">
        @csrf
        @include('students.form')
    </form>
@stop

@section('css')

@stop

@section('js')

@stop

