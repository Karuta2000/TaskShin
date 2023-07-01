<?php

namespace App\Http\Livewire\Managers;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Tag;
use App\Models\Color;

class TagManager extends Component
{

    public $name;
    public $color_id;
    public $tagId;



    public function render()
    {
        $tags = Tag::where('user_id', Auth::id())->get();
        $colors = Color::all();
        return view('livewire.managers.tag-manager', compact('tags', 'colors'));
    }



    public function clearForm(){
        $this->name = null;
        $this->color_id = Auth::user()->preferences->color_id;
        $this->tagId = null;
    }

    public function storeTag(){
        $tag = new Tag;
        $tag->name = $this->name;
        $tag->color_id = $this->color_id;
        $tag->user_id = Auth::id();
        $tag->save();
        $this->clearForm();
    }

    public function editTag($tagId){
        $this->tagId = $tagId;
        $tag = Tag::where('id', $this->tagId)->first();
        $this->name = $tag->name;
        $this->color_id = $tag->color_id;
    }

    public function updateTag(){
        $tag = Tag::where('id', $this->tagId)->first();
        $tag->name = $this->name;
        $tag->color_id = $this->color_id;
        $tag->save();
        $this->clearForm();
    }


    public function deleteTag($tagId){
        $this->tagId = $tagId;    
    }

    public function destroyTag(){
        $task = Tag::where('id', $this->tagId)->first();
        $task->delete();
    }




}
