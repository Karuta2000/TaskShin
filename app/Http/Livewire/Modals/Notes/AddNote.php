<?php

namespace App\Http\Livewire\Modals\Notes;

use App\Models\Note;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddNote extends Component
{  
    public $title;
    public $body;
    public $noteId;
    public $color_id;


    public $project_id;

    public function render()
    {
        $projects = Project::where('user_id', Auth::id())->get();
        return view('livewire.modals.notes.add-note', compact('projects'));
    }

    
    public function createNote(){
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
    }


}
