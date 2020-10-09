<div class="card">
    <div class="card-header">
        Group
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label for="group_number" class="col-sm-2 col-form-label">Group Number</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="group_number" name="group_number"
                value="{{ $model->group_number ?? null }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="course" class="col-sm-2 col-form-label">Course</label>
            <div class="col-sm-10">

                <select class="form-control" id="course" name="course">
                    @foreach($courses as $course)
                        <option value="{{ $course }}" {{ isset($model) && $model->course == $course ? "selected" : ""}}>
                            {{ $course }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="faculty_id" class="col-sm-2 col-form-label">Faculty</label>
            <div class="col-sm-10">
                <select class="form-control" id="faculty_id" name="faculty_id">
                    <option value="">Select faculty</option>
                    @foreach($faculties as $facultyId => $facultyName)
                        <option value="{{ $facultyId }}" {{ isset($model) && $model->faculty_id == $facultyId ? "selected" : ""}}>
                            {{ $facultyName }}
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
    @include('groups.group_students_js')
    {!! JsValidator::formRequest('App\Http\Requests\GroupRequest', '#form'); !!}
@stop
