<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class GroupsController extends Controller
{
    protected $viewFolderPrefix = 'groups';
    protected $routePrefix = 'groups';

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $routePrefix = $this->routePrefix;
        return view($this->viewFolderPrefix . '.index', compact('routePrefix'));
    }

    /**
     * Get resources
     *
     * @return mixed
     * @throws \Exception
     */
    public function groupsList()
    {
        $models = Group::with(['faculty']);

        $routePrefix = $this->routePrefix;
        $actions = ['edit', 'show', 'destroy'];
        $modelPrimaryKey = 'group_id';

        return Datatables::of($models)
            ->addColumn('actions', function($model) use ($routePrefix, $actions, $modelPrimaryKey) {
                return view('parts.grid_actions', compact('model', 'routePrefix', 'actions', 'modelPrimaryKey'));
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $routePrefix = $this->routePrefix;
        $courses = Course::getCourses();
        $faculties = Faculty::all()->pluck('faculty_name', 'faculty_id')->toArray();
        return view($this->viewFolderPrefix . '.create', compact('routePrefix', 'courses', 'faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GroupRequest  $request
     * @return RedirectResponse
     */
    public function store(GroupRequest $request)
    {
        Group::create($request->all());

        return redirect()->route($this->routePrefix . '.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function show(int $id)
    {
        $routePrefix = $this->routePrefix;
        $model = Group::findOrFail($id);
        return view($this->viewFolderPrefix . '.show', compact('routePrefix', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function edit(int $id)
    {
        $routePrefix = $this->routePrefix;
        $model = Group::findOrFail($id);
        $courses = Course::getCourses();
        $faculties = Faculty::all()->pluck('faculty_name', 'faculty_id')->toArray();
        return view($this->viewFolderPrefix . '.edit', compact('routePrefix', 'model', 'courses', 'faculties'));
    }

    public function getStudentsList(int $groupId)
    {
        $models = Student::where('group_id', $groupId);

        $routePrefix = 'students';
        $actions = ['edit', 'show', 'destroy'];
        $modelPrimaryKey = 'student_id';

        return Datatables::of($models)
            ->addColumn('actions', function($model) use ($routePrefix, $actions, $modelPrimaryKey) {
                return view('parts.grid_actions', compact('model', 'routePrefix', 'actions', 'modelPrimaryKey'));
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GroupRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(GroupRequest $request, int $id)
    {
        Group::findOrFail($id)->update($request->all());

        return redirect()->route($this->routePrefix . '.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy(int $id)
    {
        Group::findOrFail($id)->delete();
    }
}
