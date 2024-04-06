<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Products extends Component
{

    use WithPagination;

    public $search = '';

    public function mount(){
    }

    public function render()
    {
        if( empty( $this->search ) ){
            $products = Product::paginate(50);
        }
        if( !empty( $this->search ) ){
            $keywords = explode(' ', $this->search );
            $query = Product::query();

            foreach ($keywords as $keyword) {
                $query->whereRaw("LOWER(name) LIKE ?", ['%' . strtolower($keyword) . '%']);
            }
            $products = $query->paginate(50);        
        }
        return view('livewire.products', ['products' => $products]);
    }
}
