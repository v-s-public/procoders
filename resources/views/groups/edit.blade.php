@extends('adminlte::page')

@section('title', 'Edit group')

@section('content_header')
    <h1>Edit group</h1>
@stop

@section('plugins.JsValidation', true)
@section('plugins.Datatables', true)

@section('content')
    <form action="{{ route($routePrefix . '.update', $model->group_id) }}" class="form-horizontal" id="form" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('groups.form')
    </form>

    <div class="col-12">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="entities" class="display table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Patronymic</th>
                            <th>Surname</th>
                            <th>Date Of Birth</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop


