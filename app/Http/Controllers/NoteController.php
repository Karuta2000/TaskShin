<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Color;
use App\Models\Project;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();

        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        $colors = Color::all();
        $projects = Project::all();
        return view('notes.create', compact('colors', 'projects'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'nullable',
            'user_id' => 'required|integer',
            'project_id' => 'nullable',
            'color' => 'nullable'
        ]);

        $note = Note::create($validatedData);

        return redirect()->route('notes');


    }
    public function edit(Note $note)
    {
        $colors = Color::all();
        $projects = Project::all();
        return view('notes.edit', compact('note', 'colors', 'projects'));
    }

    public function update(Request $request, Note $note)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'nullable',
            'user_id' => 'required|integer',
            'project_id' => 'required|integer',
            'color' => 'nullable'
        ]);

        $note->update($validatedData);

        $twoPagesBackUrl = url()->previous(2);

        return redirect()->route('notes');
    }
}
