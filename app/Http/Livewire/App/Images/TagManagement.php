<?php

namespace App\Http\Livewire\App\Images;

use App\Models\Image;
use Livewire\Component;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class TagManagement extends Component
{
    public $searchTerm = '';
    public $selectedTags = [];
    public $image;

    protected $listeners = ['imageChanged'];

    public function render()
    {
        $searchResults = Tag::where('name', 'like', '%' . $this->searchTerm . '%')->get();

        return view('livewire.app.images.tag-management', [
            'searchResults' => $searchResults
        ]);
    }

    public function setTag($tagId)
    {
        if (!in_array($tagId, $this->selectedTags)) {
            $this->selectedTags[] = $tagId;
            $this->image->tags()->attach($tagId);
        } else {
            $this->image->tags()->detach($tagId);
            $this->selectedTags = array_diff($this->selectedTags, [$tagId]);
        }
    }

    public function imageChanged($id)
    {
        $this->image = Image::findOrFail($id);
        $this->reloadTags();
    }

    public function createTag()
    {
        $tag = new Tag;
        $tag->name = $this->searchTerm;
        $tag->color_id = Auth::user()->preferences->color_id;;
        $tag->user_id = Auth::id();
        $tag->save();
        $this->image->tags()->attach($tag->id);
        $this->reloadTags();
    }

    public function reloadTags()
    {
        $this->selectedTags = [];

        foreach ($this->image->tags as $tag) {
            $this->selectedTags[] = $tag->id;
        }
    }

    public function updatedSelectedTags()
    {
        $this->image->tags()->sync($this->selectedTags);
    }
}
