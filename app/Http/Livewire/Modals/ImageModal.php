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

    public $shownImage;


    protected $rules = [
        'selectedTags' => 'nullable',
    ];

    protected $listeners = ['openImageModal', 'setAvatar', 'delete'];

    public function openImageModal($image, $imageId)
    {
        $this->imageId = $imageId;
        $this->shownImage = Image::where('id', $imageId)->first();
        $this->selectedTags = [];
        foreach($this->shownImage->tags as $tag){
            array_push($this->selectedTags, $tag->id);
        }
        $this->image = $image;
        $this->shownImage->views += 1;
        $this->shownImage->save();
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
        $this->emit('successMessage', 'Avatar changed successfully.');

    }

    public function delete(){
        $thisImage = Image::where('id', $this->imageId)->first();
        $thisImage->delete();
        $this->emit('imageDeleted');
        $this->emit('successMessage', 'Image deleted successfully.');
    }

    public function saveTags()
    {
        $image = Image::where('id', $this->imageId)->first();
        $image->tags()->sync($this->selectedTags);
    }


}
