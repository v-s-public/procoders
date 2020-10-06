{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $('#entities').DataTable({--}}
{{--            paging: true,--}}
{{--            searching: true,--}}
{{--            stateSave: true,--}}
{{--            orderCellsTop: true,--}}
{{--            order: [[0, "asc"]],--}}
{{--            processing: true,--}}
{{--            pagingType: 'numbers',--}}
{{--            responsive: true,--}}
{{--            serverSide: true,--}}
{{--            ajax: '{!! route( $routePrefix.'.list') !!}',--}}
{{--            columns: [--}}
{{--                {"data": "group_number"},--}}
{{--                {"data": "course"},--}}
{{--                {"data": "faculty.faculty_name"},--}}
{{--                {"data": "actions", "orderable": false, "targets": 0},--}}
{{--            ]--}}
{{--        }).on('click', '.table-action-delete', function (e) {--}}
{{--            e.preventDefault();--}}
{{--            let url = $(this).attr('href');--}}

{{--            $('#delete-button').on('click', function (){--}}
{{--                $.ajaxSetup({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                    }--}}
{{--                });--}}

{{--                if (url !== null) {--}}
{{--                    $.ajax({--}}
{{--                        url: url,--}}
{{--                        type: 'DELETE',--}}
{{--                        dataType: 'json',--}}
{{--                        data: {method: '_DELETE', submit: true},--}}
{{--                    }).always(function (data) {--}}
{{--                        $('#entities').DataTable().draw(false);--}}
{{--                    });--}}
{{--                    url = null--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

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
                {"data": "group_id", "name": "group.group_number"},
                {"data": "actions"},
            ]
        }).on('click', '.table-action-delete', function (e) {
            e.preventDefault();
            let url = $(this).attr('href');

            $('#delete-button').on('click', function (){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                if (url !== null) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        dataType: 'json',
                        data: {method: '_DELETE', submit: true},
                    }).always(function (data) {
                        $('#entities').DataTable().draw(false);
                    });
                    url = null
                }
            });
        });

        // Filter event handler
        $(table.table().container() ).on('keyup', 'tfoot input', function() {
            table
                .column( $(this).data('index') )
                .search( this.value )
                .draw();
        });
    });
</script>
