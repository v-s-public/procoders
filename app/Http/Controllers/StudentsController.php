<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Group;
use App\Http\Requests\StudentRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class StudentsController extends Controller
{
    protected $viewFolderPrefix = 'students';
    protected $routePrefix = 'students';

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
    public function studentsList()
    {
        $models = Student::with(['group']);

        $routePrefix = $this->routePrefix;
        $actions = ['edit', 'show', 'destroy'];
        $modelPrimaryKey = 'student_id';

        return Datatables::of($models)
            ->addColumn('actions', function($model) use ($routePrefix, $actions, $modelPrimaryKey) {
                return view('parts.grid_actions', compact('model', 'routePrefix', 'actions', 'modelPrimaryKey'));
            })
            ->editColumn('group_id', function ($model) {
                return $model->group_id ? $model->group->group_number : 'Not set';
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
        $groups = Group::all()->pluck('group_number', 'group_id')->toArray();
        return view($this->viewFolderPrefix . '.create', compact('routePrefix', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StudentRequest  $request
     * @return RedirectResponse
     */
    public function store(StudentRequest $request)
    {
        Student::create($request->all());

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
        $model = Student::findOrFail($id);
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
        $model = Student::findOrFail($id);
        $groups = Group::all()->pluck('group_number', 'group_id')->toArray();
        return view($this->viewFolderPrefix . '.edit', compact('routePrefix', 'model', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StudentRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(StudentRequest $request, int $id)
    {
        Student::findOrFail($id)->update($request->all());

        return redirect()->route($this->routePrefix . '.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy(int $id)
    {
        Student::findOrFail($id)->delete();
    }
}
