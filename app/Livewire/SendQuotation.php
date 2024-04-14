<?php

namespace App\Livewire;

use App\Http\Controllers\InvoiceController;
use Livewire\Component;
use App\Mail\QuotationResponse;
use App\Models\Quotation;
use Illuminate\Support\Facades\Mail;
use Filament\Notifications\Notification;

class SendQuotation extends Component
{
    public $quotation;

    public function send(){
        $quote = $this->quotation;
        $invoice = InvoiceController::save( $quote );
        if( isset( $invoice['error'] ) ){
            return Notification::make()
                ->title( $invoice['error'] )
                ->danger()
                ->send();
        }
        Mail::to( $quote->email )->send(new QuotationResponse( $quote ));
        $quote->order_status = 'Sent Quotation';
        $quote->save();
        $this->dispatch('refresh');
        Notification::make()
                        ->title( 'Successfully sent' )
                        ->success()
                        ->send();
    }

    public function render()
    {
        return view('livewire.send-quotation');
    }
}
