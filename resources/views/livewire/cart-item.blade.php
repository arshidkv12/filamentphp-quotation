<tr x-data="{ open: true }" x-show="open" class="h-[100px] border-b">
    <td class="align-middle">
        <div class="flex">
       
        <div class="flex gap-1.5">
            <img src="{{empty($item['image']) ? url('placeholder.png') : Storage::url($item['image'])}}"
                style="height: 2.5rem;" class="max-w-none object-cover object-center ring-white dark:ring-gray-900"
            />
        </div>

        <div class="ml-3 flex flex-col justify-center">
            <p class="text-md">{{$item['name']}}</p>
            <p class="text-sm text-gray-400">Unit: {{$item['unit']}}</p>
        </div>
        </div>
    </td>
    <td class="align-middle" x-data="{ count: $wire.qty }">
        <div class="flex items-center justify-center">
        <button
            wire:click="decriment"
            x-on:click="count = count > 0 ? count-1 : count"
            class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500"
        >
            &minus;
        </button>
        <input 
            wire:model="qty"
            min="1"
            wire:change="updateQty"
            type="number"
            class="flex text-center h-8 w-16 cursor-text items-center justify-center border-t border-b active:ring-gray-500"
        />
            
        <button
            x-on:click="count++"
            wire:click="increment"
            class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500"
        >
            &#43;
        </button>
        </div>
    </td>
    <td class="align-middle">
        <svg x-on:click="open = ! open" wire:click="removeItem"
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
    </td>
</tr>