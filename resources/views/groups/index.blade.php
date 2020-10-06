@extends('adminlte::page')

@section('title', 'Groups')

@section('content_header')
    <h1>Groups</h1>
@stop

@section('plugins.Datatables', true)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('groups.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Add group
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="entities" class="display table table-bordered">
                            <thead>
                            <tr>
                                <th>Group Number</th>
                                <th>Course</th>
                                <th>Faculty</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('parts.modal_delete', ['entity' => 'group'])
@stop

@section('js')
    @include('groups.index_js')
@stop
