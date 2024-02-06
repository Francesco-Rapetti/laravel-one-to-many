<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
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
        $projects = Project::all();
        return view('admin.dashboard', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validation($request);

        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->url = $request->url;
        $project->image = $request->image;
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
        $project = Project::find($id);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validation($request);

        $project = Project::find($id);

        $project->name = $request->name;
        $project->description = $request->description;
        $project->url = $request->url;
        $project->image = $request->image;
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
