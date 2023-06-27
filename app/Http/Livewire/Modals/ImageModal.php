<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;

class ImageModal extends Component
{
    public $image;

    protected $listeners = ['openImageModal'];

    public function openImageModal($imageUrl)
    {
        $this->image = $imageUrl;
        $this->dispatchBrowserEvent('openImageModal');
    }

    public function render()
    {
        return view('livewire.modals.image-modal', [
            'image' => $this->image,
        ]);
    }
}
