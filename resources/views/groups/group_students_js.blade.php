<script>
    $(document).ready(function () {
        $('#entities').DataTable({
            paging: true,
            searching: true,
            stateSave: true,
            orderCellsTop: true,
            order: [[0, "asc"]],
            processing: false,
            pagingType: 'numbers',
            responsive: true,
            serverSide: true,
            ajax: '{!! route( $routePrefix.'.students-list', $model->group_id) !!}',
            columns: [
                {"data": "name"},
                {"data": "patronymic"},
                {"data": "surname"},
                {"data": "date_of_birth"},
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
    });
</script>
