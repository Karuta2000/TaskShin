<?php

namespace App\Http\Livewire;

use App\Models\Color;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Note;
use App\Models\Project;

class NoteManager extends Component
{
    public $searchTerm;

    public $title;
    public $body;
    public $noteId;
    public $color_id;

    public $project_id;

    public function render()
    {
        $projects = Project::where('user_id', Auth::id())->get();

        $colors = Color::all();

        $notes = Note::where('user_id', Auth::id())->where(function ($query) {
            $query->orWhere('title', 'LIKE', "%$this->searchTerm%")
                ->orWhere('body', 'LIKE', "%$this->searchTerm%");
        })->orderBy('updated_at', 'desc')->get();

        return view('livewire.note-manager', ['notes' => $notes, 'projects' => $projects, 'colors' => $colors]);
    }

    public function clearForm(){
        $this->title = null;
        $this->body = null;
        $this->color_id = 1;
        $this->project_id = null;
    }

    public function storeNote(){
        $note = new Note;
        $note->title = $this->title;
        $note->body = $this->body;
        $note->project_id = $this->project_id;
        $note->user_id = Auth::id();
        $note->color_id = $this->color_id;
        $note->save();
        $this->clearForm();
    }




}
