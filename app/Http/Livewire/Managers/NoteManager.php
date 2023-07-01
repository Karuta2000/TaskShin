<?php

namespace App\Http\Livewire\Managers;

use Livewire\Component;
use App\Models\Color;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;
use App\Models\Project;

class NoteManager extends Component
{

    public $searchTerm;
    public $project;
    protected $listeners = ['noteUpdated', 'projectUpdated'];

    public $settings = [
        'panel' => true,
        'newNote' => true,
        'noNotes' => 50
    ];


    public function render()
    {
        if($this->project != null){
            $notes = Note::where('user_id', Auth::id())->where('project_id', $this->project->id)->where(function ($query) {
                $query->orWhere('title', 'LIKE', "%$this->searchTerm%")
                    ->orWhere('body', 'LIKE', "%$this->searchTerm%");
            })->orderBy('updated_at', 'desc')->limit($this->settings['noNotes'])->get();
        }
        else{
            $notes = Note::where('user_id', Auth::id())->where(function ($query) {
                $query->orWhere('title', 'LIKE', "%$this->searchTerm%")
                    ->orWhere('body', 'LIKE', "%$this->searchTerm%");
            })->orderBy('updated_at', 'desc')->limit($this->settings['noNotes'])->get();
        }
 
        return view('livewire.managers.note-manager', ['notes' => $notes]);
    }


    public function mount(){
        
    }

    public function noteUpdated(){    
    }

    public function projectUpdated(){
      
    }
    
    public function newNote(){
        $note = new Note;
        $note->title = "New note";
        $note->body = "";
        if($this->project == null){
            $note->project_id = null;
        }
        else{
            $note->project_id = $this->project->id;
        }
        $note->user_id = Auth::id();
        $note->color_id = 1;
        $note->save();
    }
}
