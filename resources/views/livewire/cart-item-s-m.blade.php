<div x-data="{ open: true }" x-show="open" class="flex w-full border px-4 py-4">
    <img
        class="self-start object-contain"
        width="90px"
        src="{{empty($item['image']) ? url('placeholder.png') : Storage::url($item['image'])}}"
        alt="{{$item['name']}}"
    />
    <div class="ml-3 flex w-full flex-col justify-center">
        <div class="flex items-center justify-between">
        <p class="text-md">{{$item['name']}}</p>
      
        </div>
        <p class="text-sm text-gray-400">Unit: {{$item['unit']}}</p>
        <div class="mt-2 flex w-full items-center justify-between">
        <div class="flex items-center justify-center" x-data="{ count: $wire.qty }">
            <button
            x-on:click="count = count > 0 ? count-1 : count"
            wire:click="decriment"
            class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500"
            >
            &minus;
            </button>
            <input
            wire:model="qty"
            min="1"
            wire:change="updateQty"
            type="number"
            class="flex h-8 w-16 text-center cursor-text items-center justify-center border-t border-b active:ring-gray-500"
            >
            
            <button
            x-on:click="count++"
            wire:click="increment"
            class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500"
            >
            &#43;
            </button>
        </div>

        <svg
            x-on:click="open = ! open" wire:click="removeItem"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            class="m-0 h-5 w-5 cursor-pointer"
        >
            <path
            fill-rule="evenodd"
            d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
            clip-rule="evenodd"
            />
        </svg>
        </div>
    </div>
</div>