<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Contracts\Filesystem\Filesystem;

class Product extends Component
{

    public $product;
    public $image;

    public function mount($product)
    {
        $this->product = $product;
        $this->image = empty($product->image) ? url('placeholder.png') : Storage::url($product->image);
    }


    

    public function render()
    {
        return view('livewire.product');
    }
}
