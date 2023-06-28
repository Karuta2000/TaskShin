<?php

namespace App\Http\Livewire\Modals;

use App\Models\Image;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ImageModal extends Component
{
    public $image;
    public $imageId;

    public $tags;

    public $selectedTags = [];


    protected $rules = [
        'selectedTags' => 'nullable',
    ];

    protected $listeners = ['openImageModal', 'setAvatar', 'delete'];

    public function openImageModal($image, $imageId)
    {
        $this->imageId = $imageId;
        $shownImage = Image::where('id', $imageId)->first();
        $this->selectedTags = [];
        foreach($shownImage->tags as $tag){
            array_push($this->selectedTags, $tag->id);
        }
        $this->image = $image;
        $this->emit('imageChanged', $imageId);
        $this->dispatchBrowserEvent('openImageModal');
    }

    public function render()
    {
        $this->tags = Tag::where('user_id', Auth::id())->get();
        return view('livewire.modals.image-modal', [
            'image' => $this->image,
        ]);
    }

    public function setAvatar(){
        $user = User::where('id', Auth::id())->first();
        $user->avatar = $this->image;
        $user->save();
        $this->emit('avatarChanged');

    }

    public function delete(){
        $thisImage = Image::where('id', $this->imageId)->first();
        $thisImage->delete();
        $this->emit('imageDeleted');
    }

    public function saveTags()
    {
        $image = Image::where('id', $this->imageId)->first();
        $image->tags()->sync($this->selectedTags);
        $this->emit('avatarChanged');
    }


}
