<div class="card">
    <div class="card-header">
        Student
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name"
                value="{{ $model->name ?? null }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="patronymic" class="col-sm-2 col-form-label">Patronymic</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="patronymic" name="patronymic"
                       value="{{ $model->patronymic ?? null }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="surname" class="col-sm-2 col-form-label">Surname</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="surname" name="surname"
                       value="{{ $model->surname ?? null }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="date_of_birth" class="col-sm-2 col-form-label">Date of birth</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-prepend">
	                    <span class="input-group-text">
		                    <i class="far fa-calendar-alt"></i>
	                    </span>
                    </div>
                    <input type="text" class="form-control float-right" id="date_of_birth" name="date_of_birth"
                           value="{{ $model->date_of_birth ?? null }}">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="faculty_id" class="col-sm-2 col-form-label">Group</label>
            <div class="col-sm-10">
                <select class="form-control" id="group_id" name="group_id">
                    <option value="">Select group</option>
                    @foreach($groups as $groupId => $groupNumber)
                        <option value="{{ $groupId }}" {{ isset($model) && $model->group_id == $groupId ? "selected" : ""}}>
                            {{ $groupNumber }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        @include('parts.form_footer_button')
    </div>
    <!-- /.card-footer -->
</div>

@section('js')
    {!! JsValidator::formRequest('App\Http\Requests\StudentRequest', '#form'); !!}
    <script>
        $('#date_of_birth').datepicker({
            format: "yyyy-mm-dd",
            endDate: "0d"
        })
    </script>
@stop
