@extends('adminlte::page')

@section('title', 'Show group')

@section('content_header')
    <h1>Show group</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Group
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Group Number</th>
                    <th>Course</th>
                    <th>Faculty</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $model->group_number }}</td>
                    <td>{{ $model->course }}</td>
                    <td>{{ $model->faculty->faculty_name }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            @include('parts.show_screen_footer_button')
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop

