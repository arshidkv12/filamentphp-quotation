<section
    class="container mx-auto flex-grow max-w-[1200px] border-b py-5 lg:flex lg:flex-row lg:py-10"
>
    <!-- Mobile cart table  -->
    <section
        class="container mx-auto my-3 flex w-full flex-col gap-3 px-4 md:hidden"
    >
        @foreach($cart as $item)
            <livewire:cart-item-s-m :item="$item" />
        @endforeach
    </section>
    <!-- /Mobile cart table  -->

    <!-- Desktop cart table  -->
    <section
        class="hidden  w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10 md:grid"
    >
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
            <livewire:cart-item :item="$item" />
        @endforeach

        </tbody>
        </table>
    </section>
    <!-- /Desktop cart table  -->

    <!-- Summary  -->

    <section class="mx-auto w-full px-4 md:max-w-[400px]">
        <div class="">
        <div class="border py-5 px-4 shadow-md">
            <p class="font-bold">ORDER SUMMARY</p>

            <div class="flex justify-between border-b py-5">
            <p>Subtotal</p>
            <p>$1280</p>
            </div>

            <div class="flex justify-between border-b py-5">
            <p>Shipping</p>
            <p>Free</p>
            </div>

            <div class="flex justify-between py-5">
            <p>Total</p>
            <p>$1280</p>
            </div>

            <a href="checkout-address.html">
            <button class="w-full bg-violet-900 px-5 py-2 text-white">
                Proceed to checkout
            </button>
            </a>
        </div>
        </div>
    </section>
</section>