<div>
    
    <div class="my-5 px-5 flex justify-center w-full">
        <form action="#" class="h-9 w-full md:w-2/5  items-center border flex">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="mx-3 h-4 w-4"
            >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
            />
            </svg>

            <input
            class="hidden w-11/12 outline-none md:block"
            type="search"
            wire:model.live="search"
            placeholder="Search"
            />

            <button disabled class="ml-auto h-full bg-amber-400 px-4 hover:bg-yellow-300">
            Search
            </button>
        </form>
    </div>

    <section id="rec-prod"
      class="my-5 mx-auto grid max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10 lg:grid-cols-4"
    >
       @foreach($products as $product)
        <livewire:product :product="$product" :wire:key="'prod-'.$product->id" />
       @endforeach

    </section>

    <div class=" mx-auto grid max-w-[1200px]">
    {{ $products->links() }} 
    </div>
</div>
