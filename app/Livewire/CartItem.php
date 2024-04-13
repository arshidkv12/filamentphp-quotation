<?php

namespace App\Livewire;

use Livewire\Component;

class CartItem extends Component
{
    public $item;
    public $qty;
    public $product_id;

    public function mount(){
        $this->qty = $this->item['qty'];
        $this->product_id = $this->item['product_id'];
    }

    public function updateQty(){
        $cart = session('cart', []);
        $this->item['qty'] = $this->qty;
        $cart[ $this->product_id ] = $this->item;
        session(['cart' => $cart]);
    }

    public function increment(){
        $this->qty = $this->qty + 1;
        $this->updateQty();
    }

    public function decriment(){
        if( $this->qty <= 1) return;
        $this->qty = $this->qty - 1;
        $this->updateQty();
    }

    public function removeItem(){
        $cart = session('cart', []);
        unset( $cart[ $this->product_id ]);
        session(['cart' => $cart]);
        // $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart-item');
    }
}
