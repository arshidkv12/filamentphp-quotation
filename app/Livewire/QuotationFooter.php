<?php

namespace App\Livewire;

use App\Models\QuotationItem;
use Livewire\Component;

class QuotationFooter extends Component
{

    public $total_price = 0;
    public $quotation;

    protected $listeners = [ 'quoteUpdated' => 'quoteUpdated' ];

    public function mount($quotation)
    {
        $this->quotation = $quotation;

        $quoteItems = QuotationItem::where('quotation_id', $this->quotation->id )->get();

        $totalPrice = 0;
        foreach($quoteItems as $item){
            $totalPrice += $item->qty * $item->price;
        }
        $this->total_price = number_format( $totalPrice, 2 );
    }

    public function quoteUpdated()
    {
        $quoteItems = QuotationItem::where('quotation_id', $this->quotation->id )->get();

        $totalPrice = 0;
        foreach($quoteItems as $item){
            $totalPrice += $item->qty * $item->price;
        }
        $this->total_price = number_format( $totalPrice, 2);
    }

    public function render()
    {
        return view('livewire.quotation-footer');
    }
}
