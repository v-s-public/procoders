@extends('adminlte::page')

@section('title', 'Add student')

@section('content_header')
    <h1>Edit student</h1>
@stop

@section('plugins.JsValidation', true)
@section('plugins.DateTimePicker', true)

@section('content')
    <form action="{{ route($routePrefix . '.update', $model->student_id) }}" class="form-horizontal" id="form" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('students.form')
    </form>
@stop

@section('css')

@stop

@section('js')

@stop


