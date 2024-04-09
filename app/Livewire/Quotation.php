<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Quotation as QuotationModel;
use App\Models\QuotationItem;

class Quotation extends Component
{

    public $cart = [];

    protected $listeners = ['addToQuote', 'removeQuote'];

    public function mount(){
        $this->cart = session('cart', []);
    }
 
    public function addToQuote( $product_id )
    {
        $cart = session('cart');
        $product = Product::find( $product_id );
        $cart[ $product_id ] = [
            'product_id' => $product_id, 
            'name' => $product->name,
            'unit' => $product->unit,
            'image' => $product->image,
            'qty' => 1
        ];
        session(['cart' => $cart ] );  
        $this->cart = $cart;
        $this->dispatch('showToast', 'Porduct added');      
    }

    public function removeQuote( $product_id )
    {
        $cart = session('cart');
        unset( $cart[ $product_id ] );
        session(['cart' => $cart ] );  
        $this->cart = $cart;      
    }
 
    public function render()
    {
        return view('livewire.quotation');
    }
}
