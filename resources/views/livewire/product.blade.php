<div class="flex flex-col">
    <div class="relative flex border">
        <img
            class=""
            src="{{ $image }}"
            alt="{{$product->name}}"
        />
    </div>

    <div>
        <p class="mt-2">{{$product->name}}</p>

        <div class="mt-2 text-sm min-h-10">
            {!!$product->description!!}
        </div>
        <button class="my-5 h-10 w-full bg-violet-900 text-white">
            Get Quotation
        </button>
        </div>
    </div>
</div>