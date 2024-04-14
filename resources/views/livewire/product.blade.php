<div class="flex flex-col">
    <div class="justify-center items-center relative flex border">
        <div class="w-52 h-52 relative overflow-hidden">
            <img
                class="absolute inset-0 w-full h-full object-contain"
                src="{{ $image }}"
                alt="{{$product->name}}"
            />
        </div>
    </div>

    <div>
        <p class="mt-2 max-md:min-h-12 font-medium">{{$product->name}}</p>
        <p class="mt-2 text-sm">Unit : {{$product->unit}}</p>

        <div class="mt-2 text-sm min-h-20">
            {!!$product->description!!}
        </div>
        @if( $in_cart )
        <div class="flex justify-center">Product Added!</div>
        <a href="{{url('/cart')}}"  class="items-center flex justify-center bg-green-500 hover:bg-green-600 mb-5 h-10 w-full text-white">
            Go to Quote Page
        </a>
        @else
        <button  wire:loading.attr="disabled" wire:click="addToQuote({{ $product->id }})" class="my-5 mt-6 h-10 w-full bg-violet-900 text-white">
            Get Quotation
            <svg wire:loading class="fill-current inline" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle class="spinner_S1WN" cx="4" cy="12" r="3"/><circle class="spinner_S1WN spinner_Km9P" cx="12" cy="12" r="3"/><circle class="spinner_S1WN spinner_JApP" cx="20" cy="12" r="3"/></svg>
        </button>
        @endif
    </div>
</div>
