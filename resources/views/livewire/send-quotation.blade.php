 <div>
    <x-filament::button  :disabled="$quotation->order_status=='Sent Quotation'"  key='send-quotation-email' icon="heroicon-m-envelope" wire:click='send'>
        {{ $quotation->order_status == 'Request' ? 'Send Quotation' : 'Already Sent' }}
    </x-filament::button>
</div>