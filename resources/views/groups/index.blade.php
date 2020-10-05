@extends('adminlte::page')

@section('title', 'Groups')

@section('content_header')
    <h1>Groups</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Add group</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="entities" class="display table table-bordered">
                            <thead>
                            <tr>
                                <th>Group Number</th>
                                <th>Course</th>
                                <th>Faculty</th>
{{--                                <th class="actions-column-3">Actions</th>--}}
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#entities').DataTable({
                paging: true,
                searching: true,
                stateSave: true,
                orderCellsTop: true,
                order: [[0, "asc"]],
                processing: true,
                pagingType: 'numbers',
                responsive: true,
                serverSide: true,
                ajax: '{!! route( $routePrefix.'.list') !!}',
                columns: [
                    {"data": "group_number"},
                    {"data": "course"},
                    {"data": "faculty.faculty_name"},
                ]
            })
        });
    </script>
@stop
