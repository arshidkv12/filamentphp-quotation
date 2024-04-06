<?php
namespace App\Livewire;

use Livewire\Component;

class ToastComponent extends Component
{
    public $message;
    public $type;
    public $isVisible = false;

    protected $listeners = ['showToast'];

    public function showToast($message, $type = 'success')
    {
        $this->message = $message;
        $this->type = $type;
        $this->isVisible = true;

        $this->dispatch('toastShown');
    }

    public function hideToast()
    {
        $this->isVisible = false;
    }

    public function render()
    {
        return view('livewire.toast-component');
    }
}
