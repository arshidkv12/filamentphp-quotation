<?php

namespace App\Livewire;

use App\Models\QuotationItem;
use Livewire\Component;

class QuotationFooter extends Component
{

    public $total_price = 0;
    public $quotationId;

    protected $listeners = [ 'quoteUpdated' => 'quoteUpdated' ];

    public function mount($quotationId)
    {
        $this->quotationId = $quotationId;

        $quoteItems = QuotationItem::where('quotation_id', $this->quotationId )->get();

        $totalPrice = 0;
        foreach($quoteItems as $item){
            $totalPrice += $item->qty * $item->price;
        }
        $this->total_price = number_format( $totalPrice, 2 );
    }

    public function quoteUpdated()
    {
        $quoteItems = QuotationItem::where('quotation_id', $this->quotationId )->get();

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
