@if(in_array('show', $actions))
    <a href="{{ route($routePrefix.'.show', $model[$modelPrimaryKey]) }}" class="table-action"><i class="fa fa-eye"></i></a>
@endif

@if(in_array('edit', $actions))
    <a href="{{ route($routePrefix.'.edit', $model[$modelPrimaryKey]) }}" class="table-action"><i class="fa fa-edit"></i></a>
@endif

@if(in_array('destroy', $actions))
    <a href="{{ route($routePrefix.'.destroy', $model[$modelPrimaryKey]) }}" class="table-action table-action-delete" data-toggle="modal" data-target="#modal-sm"><i class="fa fa-trash"></i></a>
@endif
