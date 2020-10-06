@extends('adminlte::page')

@section('title', 'Add group')

@section('content_header')
    <h1>Edit group</h1>
@stop

@section('plugins.JsValidation', true)

@section('content')
    <form action="{{ route($routePrefix . '.update', $model->group_id) }}" class="form-horizontal" id="form" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('groups.form')
    </form>
@stop

@section('css')

@stop

@section('js')

@stop


