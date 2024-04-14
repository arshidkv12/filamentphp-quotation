<?php

namespace App\Livewire;

use App\Mail\QuoteRequest;
use App\Mail\QuoteRequestConfirmation;
use App\Models\Quotation;
use App\Models\QuotationItem;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class Cart extends Component
{

    public $cart = [];
    public $name;
    public $email;
    public $phone;
    public $message;
    public $quotation_id;
    public $company;

    protected $listeners = ['cartUpdated' => 'cartUpdated'];


    public function mount(){
        $this->cart = session('cart', []);
    }
    
    public function cartUpdated(){
         $this->cart = session('cart', []);
    }

    public function submit(){
        
        
        $quote = New Quotation;
        $quote->name = $this->name;
        $quote->email = $this->email;
        $quote->phone = $this->phone;
        $quote->message = $this->message;
        $quote->company = $this->company;
        $quote->status = 'unread';
        $quote->save();

        $this->cart = session('cart', []);
        foreach($this->cart as $product){
            $item = new QuotationItem;
            $item->product_id = $product['product_id'];
            $item->quotation_id = $quote->id;
            $item->name = $product['name'];
            $item->qty = $product['qty'];
            $item->save();
        }

        session(['cart' => []]);
        $this->cart = [];
        $this->reset();
        $this->quotation_id = $quote->id;

        $admin_email = config('mail.admin_email');
        Mail::to( $quote->email )->send(new QuoteRequestConfirmation( $quote ));
        Mail::to( $admin_email )->send(new QuoteRequest( $quote ));
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
