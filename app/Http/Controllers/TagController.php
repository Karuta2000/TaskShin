<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Task;
use App\Models\Project;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags|max:255',
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags,name,' . $tag->id . '|max:255',
        ]);

        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }

    public function attachTagsToProject(Request $request, Project $project)
    {
        $tagId = $request->input('tag_id', []);
        $project->tags()->sync($tagId);

        return redirect()->route('projects.show', $project)->with('success', 'Tags attached successfully.');
    }

    public function attachTagsToTask(Request $request, Task $task)
    {
        $tagIds = $request->input('tag_ids', []);
        $task->tags()->sync($tagIds);

        return redirect()->route('tasks.show', $task)->with('success', 'Tags attached successfully.');
    }
}
