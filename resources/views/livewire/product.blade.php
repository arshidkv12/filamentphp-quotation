<div class="flex flex-col">
    <div class="relative flex border">
        <img
            class=""
            src="{{ $image }}"
            alt="{{$product->name}}"
        />
    </div>

    <div>
        <p class="mt-2 max-md:min-h-12">{{$product->name}}</p>

        <div class="mt-2 text-sm min-h-20">
            {!!$product->description!!}
        </div>
        @if( $in_cart )
        <button  class="bg-green-500 hover:bg-green-600 my-5 h-10 w-full bg-violet-900 text-white">
            Go to Quote Page
        </button>
        @else
        <button wire:click="addToQuote({{ $product->id }})" class="my-5 h-10 w-full bg-violet-900 text-white">
            Get Quotation
        </button>
        @endif
    </div>
</div>
