<?php

namespace App\Http\Livewire\Cards;

use App\Models\Color;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Note;

class NoteCard extends Component
{
    public $note;
    public $edit;
    public $title;
    public $body;
    public $colors;
    public $projects;
    public $color;
    public $project_id;

    public function render()
    {
        $this->colors = Color::all();
        $this->project_id = $this->note->project_id;
        $this->projects = Project::where('user_id', Auth::id())->get();
        $this->color = Color::where('id', $this->note->color_id)->first();
        return view('livewire.cards.note-card');
    }

    public function edit(){
        if($this->note->user_id == Auth::id()){
            if($this->edit){
                $this->update();
            }
            else{
                $this->title = $this->note->title;
                $this->body = $this->note->body;
                $this->edit = true;
            }
        }

    }

    private function update(){
        $this->note->title = $this->title;
        $this->note->body = $this->body; 
    }

    public function save(){
        $this->update();
        $this->edit = false;
        $this->note->save();
    }

    public function delete(){
        $this->note->delete();
        $this->emit('noteUpdated');
    }

    public function copy(){
        $note = new Note();     
        $note->title = $this->note->title;
        $note->body = $this->note->body;
        $note->project_id = $this->note->project_id;
        $note->user_id = Auth::id();
        $note->color_id = $this->note->color_id;
        $note->save();
        $this->emit('noteUpdated');
    }

    public function loadColors(){
        $this->colors = Color::all();

    }

    public function setColor($color_id){
        $this->note->color_id = $color_id;
        $this->note->save();
    }

    public function setProject(){
        $this->note->project_id = $this->project_id;
        $this->note->save();
        $this->emit('projectUpdated');
    }




}
