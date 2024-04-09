<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{

    public $cart = [];

    protected $listeners = ['cartUpdated'];


    public function mount(){
        $this->cart = session('cart', []);
    }
    
    public function cartUpdated(){
        $this->cart = session('cart', []);
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
