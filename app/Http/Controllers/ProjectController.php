<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|unique:projects|min:3|max:255',
            'topic'=> 'required|unique:projects|min:3|max:255',
            'gitHub'=> 'required|unique:projects|min:5|max:255'
        ]);
        $data = $request->all();

        $newProject = new Project();
        $newProject->title = $data['title'];
        $newProject->topic = $data['topic'];
        $newProject->date = date('y-m-d');
        $newProject->gitHub = $data['gitHub'];
        $newProject->slug = '';
        $newProject->save();
        $newProject->slug = Str::of("$newProject->id " . $data['title'])->slug('-');
        $newProject->save();

        return redirect()->route('projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $project = Project::findOrFail($slug);
        return view('admin.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $project = Project::findOrFail($id);
        $data = $request->validate([
            'title'=> ['required',Rule::unique('projects')->ignore($project->id),'min:3','max:255'],
            'topic'=> ['required',Rule::unique('projects')->ignore($project->id),'min:3','max:255'],
            'gitHub'=> ['required',Rule::unique('projects')->ignore($project->id),'min:5','max:255']
        ]);
        
        $data = $request->all();

        $project->title = $data['title'];
        $project->topic = $data['topic'];
        $project->date = date('y-m-d');
        $project->gitHub = $data['gitHub'];
        $project->slug = Str::of("$project->id " . $data['title'])->slug('-');
        $project->save();

        return redirect()->route('projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }

    public function trashed()
    {
        $projects = Project::onlyTrashed()->get();

        return view('admin.trashed', compact('projects'));
    }

    public function restore($id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->restore();
        return redirect()->route('projects.show', compact('project'));
    }
    
    public function obliterate($id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->forceDelete();

        return redirect()->route('admin.trashed');
    }
}
