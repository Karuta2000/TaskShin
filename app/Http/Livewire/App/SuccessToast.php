<?php

namespace App\Http\Livewire\App;

use Livewire\Component;

class SuccessToast extends Component
{
    protected $listeners = ['successMessage'];

    public $message = 'aaaaaa';

    public function successMessage($message)
    {
        $this->message = $message;
        $this->emit('show-success-toast');
    }

    public function render()
    {
        return view('livewire.app.success-toast');
    }
}