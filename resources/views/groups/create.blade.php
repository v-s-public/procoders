@extends('adminlte::page')

@section('title', 'Add group')

@section('content_header')
    <h1>Add group</h1>
@stop

@section('plugins.JsValidation', true)

@section('content')
    <form action="{{ route($routePrefix . '.store') }}" class="form-horizontal" id="form" method="post" enctype="multipart/form-data">
        @csrf
        @include('groups.form')
    </form>
@stop

@section('css')

@stop

@section('js')

@stop

