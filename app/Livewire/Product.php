<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Contracts\Filesystem\Filesystem;

class Product extends Component
{

    public $product;
    public $image;
    public $in_cart;

    public function mount($product)
    {
        $cart = session('cart', []);
        if( isset( $cart[ $product->id ] ) ){
            $this->in_cart = true;
        }
        $this->product = $product;
        $this->image = empty($product->image) ? url('placeholder.png') : Storage::url($product->image);
    }


    public function addToQuote( $product_id ){
        $this->in_cart = true;
        $this->dispatch('addToQuote', $product_id);
    }

    public function removeQuote( $product_id ){
        $this->in_cart = false;
        $this->dispatch('removeQuote', $product_id);
    }

    public function render()
    {
        return view('livewire.product');
    }
}
