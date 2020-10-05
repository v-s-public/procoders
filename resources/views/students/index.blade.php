@extends('adminlte::page')

@section('title', 'Groups')

@section('content_header')
    <h1>Students</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Add student</div>
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
{{--                                <th class="actions-column-3">Actions</th>--}}
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
@stop

@section('css')
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#entities tfoot th').each( function (i) {
                var title = $('#entities thead th').eq( $(this).index() ).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" data-index="'+i+'" />' );
            });

            var table = $('#entities').DataTable({
                paging: true,
                searching: true,
                stateSave: true,
                orderCellsTop: true,
                order: [[0, "asc"]],
                processing: false,
                pagingType: 'numbers',
                responsive: true,
                serverSide: true,
                ajax: '{!! route( $routePrefix.'.list') !!}',
                columns: [
                    {"data": "name"},
                    {"data": "patronymic"},
                    {"data": "surname"},
                    {"data": "date_of_birth"},
                    {"data": "group.group_number"},
                ]
            })

            // Filter event handler
            $(table.table().container() ).on('keyup', 'tfoot input', function() {
                table
                    .column( $(this).data('index') )
                    .search( this.value )
                    .draw();
            });
        });
    </script>
@stop
