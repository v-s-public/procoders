@extends('adminlte::page')

@section('title', 'Groups')

@section('content_header')
    <h1>Students</h1>
@stop

@section('plugins.Datatables', true)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('students.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Add student
                    </a>
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
                                <th>Group</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Patronymic</th>
                                <th>Surname</th>
                                <th>Date Of Birth</th>
                                <th>Group</th>
                                {{--                                <th class="actions-column-3">Actions</th>--}}
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('parts.modal_delete', ['entity' => 'student'])
@stop

@section('css')
@stop

@section('js')
    @include('students.index_js')
@stop
