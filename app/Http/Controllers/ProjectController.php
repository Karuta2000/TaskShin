<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

use App\Models\Project;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('tasks')->get();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $colors = Color::all();
        return view('projects.create', compact('colors'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'user_id' => 'required|integer',
            'color' => 'nullable'
        ]);

        $project = Project::create($validatedData);

        return redirect()->route('projects.show', $project->id)->with('success', 'Projekt byl úspěšně vytvořen!');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));

    }

    public function edit(Project $project)
    {
        $colors = Color::all();
        return redirect()->route('projects.show', $project->id)->with('success', 'Projekt byl úspěšně upraven!');
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'user_id' => 'required|integer',
            'color' => 'nullable'
        ]);

        $project->update($validatedData);

        return redirect()->route('projects.show', $project->id);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects');
    }
}
