<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::where('user_id', Auth::id());

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
            'color' => 'required'
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->color= $request->color;
        $tag->user_id = $request->user_id;
        $tag->save();

        return redirect()->route('tags')->with('success', 'Tag created successfully.');
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags,name,' . $tag->id . '|max:255',
            'color' => 'required'
        ]);

        $color = substr($request->color, 1);

        $tag->name = $request->name;
        $tag->color = $color;
        
        $tag->save();

        return redirect()->route('tags')->with('success', 'Tag updated successfully.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags')->with('success', 'Tag deleted successfully.');
    }

    public function attachTagsToProject(Request $request, Project $project)
    {
        $tagIds = $request->input('tag_ids', []);
        $project->tags()->sync($tagIds);
        
        return redirect()->route('projects.show', $project)->with('success', 'Tags attached successfully.');
    }

    public function attachTagsToTask(Request $request, Task $task)
    {
        $tagIds = $request->input('tag_ids', []);
        $task->tags()->sync($tagIds);

        return redirect()->route('tasks.show', $task)->with('success', 'Tags attached successfully.');
    }
}
