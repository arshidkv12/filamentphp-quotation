<div>

    <section
        class="container mx-auto flex-grow max-w-[1200px] border-b py-5 lg:flex lg:flex-row lg:py-10"
    >
       
        <!-- Mobile cart table  -->
        <section
            class="container justify-center mx-auto my-3 flex w-full flex-col gap-3 px-4 md:hidden"
        >
            @if( ! empty( $quotation_id ) )
                <div class="p-4 mx-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">Successfully submitted.</span>We will contact you as soon as possible.
                </div>
            @endif

            @if(empty($quotation_id) && empty( $cart ))
            <p class="font-bold mx-auto">No products in the list</p>
            <a href="{{url('/')}}" class="h-12 pt-3 bg-amber-500 text-center hover:bg-amber-700 text-white font-bold py-2 px-4 rounded">
                Shop More Products
            </a>
            @endif
            
        </section>
        @if( empty($quotation_id) && !empty( $cart ))
        <section
            class="container mx-auto my-3 flex w-full flex-col gap-3 px-4 md:hidden"
        >
            @foreach($cart as $item)
                <livewire:cart-item-s-m :item="$item" wire:key="sm-item-{{$item['product_id']}}"/>
            @endforeach
            <a href="{{url('/')}}" class="h-12 pt-3 bg-amber-500 text-center hover:bg-amber-700 text-white font-bold py-2 px-4 rounded">
                Shop More Products
            </a>
        </section>
        @endif
        <!-- /Mobile cart table  -->

        <!-- Desktop cart table  -->
        <section
            class="hidden  w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10 md:grid"
        >
            @if( ! empty( $quotation_id ) )
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">Successfully submitted.</span>We will contact you as soon as possible.
            </div>
            @endif

            @if( empty( $quotation_id ) && empty( $cart ))
            <p class="font-bold mx-auto">No products in the list</p>
            @elseif( !empty( $cart ))
            <table class="table-fixed">
            <thead class="h-16 bg-neutral-100">
                <tr>
                    <th>ITEM</th>
                    <th>QUANTITY</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($cart as $item)
                <livewire:cart-item :item="$item" wire:key="item-{{$item['product_id']}}"/>
            @endforeach
            </tbody>
            </table>
            @endif

            <a href="{{url('/')}}" class="h-12 pt-3 bg-amber-500 text-center hover:bg-amber-700 text-white font-bold py-2 px-4 rounded">
                Shop More Products
            </a>
        </section>
        <!-- /Desktop cart table  -->

        <!-- Summary  -->

        <section class="mx-auto w-full px-4 md:max-w-[400px]">
            <div class="">
            <div class="max-w-md mx-auto">
                @if(!empty( $cart ))
                <form wire:submit.prevent="submit" class="bg-white border rounded px-8 pt-6 pb-8 mb-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Name*
                        </label>
                        <input required wire:model="name" class="border appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Your Name">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Company Name
                        </label>
                        <input wire:model="company" class="border appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Company Name">
                    </div>
                    <div class="mb-4">
                        <label  class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email*
                        </label>
                        <input required wire:model="email" class="border appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Your Email">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Mobile No*
                        </label>
                        <input required wire:model="phone" class="border appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tel" type="tel" placeholder="Mobile No">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                            Message
                        </label>
                        <textarea wire:model="message" class="border appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" placeholder="Your Message"></textarea>
                    </div>
                    <div class="flex items-center justify-between">
                        <button wire:loading.attr="disabled"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                           <span wire:loading.remove>Submit</span>
                           <span wire:loading>Submitting...</span>
                        </button>
                    </div>
                </form>
                @endif
            </div>

            </div>
        </section>

        
    </section>
</div>