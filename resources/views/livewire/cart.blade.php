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
        <div class="max-w-md mx-auto">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Name
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Your Name">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="Your Email">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Mobile No
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="Mobile No">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                Message
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message" placeholder="Your Message"></textarea>
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Send
            </button>
        </div>
    </form>
</div>

        </div>
    </section>
</section>