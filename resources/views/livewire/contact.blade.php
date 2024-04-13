<section class="container mx-auto flex-grow max-w-[1200px] mt-10">
    <div class="grid sm:grid-cols-2 grid-cols-1 gap-4">
        <div class="mt-24 mx-4 sm:mx-1">
            <div class="border py-5 shadow-md">
                <div class="flex justify-between px-4 pb-5">
                    <p class="text-xl font-bold">Support</p>
                </div>

                <div class="flex flex-col px-4">
                    <a class="flex items-center" href="mailto:starcityqa@gmail.com"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-3 h-4 w-4 text-violet-900">
                        <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z"></path>
                        <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z"></path>
                    </svg>
                    Starcityqa@gmail.com</a>
                    <a class="flex items-center my-2" href="tel:+97430093821"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-3 h-4 w-4 text-violet-900">
                        <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z" clip-rule="evenodd"></path>
                    </svg>
                    +974 3009 3821</a>
                    <a class="flex items-center" href="mailto:+974 6619 3214"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-3 h-4 w-4 text-violet-900">
                        <path fill-rule="evenodd" d="M3.43 2.524A41.29 41.29 0 0110 2c2.236 0 4.43.18 6.57.524 1.437.231 2.43 1.49 2.43 2.902v5.148c0 1.413-.993 2.67-2.43 2.902a41.202 41.202 0 01-5.183.501.78.78 0 00-.528.224l-3.579 3.58A.75.75 0 016 17.25v-3.443a41.033 41.033 0 01-2.57-.33C1.993 13.244 1 11.986 1 10.573V5.426c0-1.413.993-2.67 2.43-2.902z" clip-rule="evenodd"></path>
                    </svg>
                    +974 6619 3214</a>
                </div>
            </div>
        </div>
        <div class="mx-auto my-5 text-center">
            <h2 class=" text-3xl font-bold">Have another question?</h2>
            <p>Complete the form below</p>
            @if(  !empty( $alert ) )
            <div class="p-4 my-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">Successfully submitted.</span>We will contact you as soon as possible.
            </div>
            @endif
            <form wire:submit.prevent="submit" c class="mx-auto my-5 max-w-[600px] px-5 pb-10" action="">
            <div class="mx-auto">
                <div class="my-3 flex w-full gap-2">
                    <input required wire:model="email" class="w-1/2 border px-4 py-2" type="email" placeholder="E-mail">
                    <input required wire:model="name" class="w-1/2 border px-4 py-2" type="text" placeholder="Full Name">
                </div>
            </div>

            <input wire:model="phone" required class="w-full mb-2 border px-4 py-2" type="tel" placeholder="Mobile No">

            <textarea wire:model="message" required class="w-full mt-2 border px-4 py-2" placeholder="Write a commentary..." name="" id=""></textarea>

            <div class="lg:items:center container mt-4 flex flex-col justify-between lg:flex-row">
                <div class="flex items-center">
                
                </div>
                <button class="my-3 bg-amber-400 px-4 py-2 lg:my-0">
                Send Message
                </button>
            </div>
            </form>
        </div>
    </div>
</section>