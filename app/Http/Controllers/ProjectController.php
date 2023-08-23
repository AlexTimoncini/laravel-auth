<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Str;

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
    public function show(string $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
