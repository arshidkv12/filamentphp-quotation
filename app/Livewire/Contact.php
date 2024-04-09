<?php

namespace App\Livewire;

use Livewire\Component;

class Contact extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;
    public $alert;

    public function submit() {
        dd($this->message);
        $this->alert = 'success';
        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
