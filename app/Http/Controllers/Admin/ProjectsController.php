<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Support\Facades\Validator;

class ProjectsController extends Controller
{
    public function validation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:projects,name',
            // 'description' => '',
            'image' => 'url',
            'url' => 'url'
        ])->validate();

        return $validator;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        $projects = Project::all();
        return view('admin.dashboard', compact('projects', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validation($request);

        $project = new Project();
        $project->fill($request->all());
        $project->save();

        return redirect()->route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $types = Type::all();
        $project = Project::find($id);
        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validation($request);

        $project = Project::find($id);

        $project->fill($request->all());
        $project->update();
        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // $project = Project::find($id);
        $project->delete();
        return redirect()->route('admin.dashboard');
    }
}
