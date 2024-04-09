<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')

    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
    @livewireStyles

  </head>

  <body x-data="{ desktopMenuOpen: false, mobileMenuOpen: false}">
    <!-- Header -->
    <header
      class="mx-auto flex h-16 max-w-[1200px] items-center justify-between px-5"
    >
      <a href="{{url('/')}}">
        <img
          class="cursor-pointer sm:h-auto sm:w-auto"
          src="./assets/images/company-logo.svg"
          alt="Logo"
        />
      </a>

      <div class="md:hidden">
        <button @click="mobileMenuOpen = ! mobileMenuOpen">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="h-8 w-8"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
            />
          </svg>
        </button>
      </div>

      <div class="hidden gap-3 md:!flex">
         

        <a
          href="{{url('/cart')}}"
          class="flex cursor-pointer flex-col items-center justify-center"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="h-6 w-6"
          >
            <path
              fill-rule="evenodd"
              d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z"
              clip-rule="evenodd"
            />
          </svg>

          <p class="text-xs">Cart</p>
        </a>


      </div>
    </header>
    <!-- /Header -->

    <!-- Burger menu  -->
    <section
      x-show="mobileMenuOpen"
      @click.outside="mobileMenuOpen = false"
      class="absolute left-0 right-0 z-50 h-screen w-full bg-white"
      style="display: none"
    >
      <div class="mx-auto">
        <div class="mx-auto flex w-full justify-center gap-3 py-4">
         

          <a
            href="{{url('/cart')}}"
            class="flex cursor-pointer flex-col items-center justify-center"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              class="h-6 w-6"
            >
              <path
                fill-rule="evenodd"
                d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z"
                clip-rule="evenodd"
              />
            </svg>

            <p class="text-xs">Cart</p>
          </a>
        </div>

        <form class="my-4 mx-5 flex h-9 items-center border">
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
            placeholder="Search"
          />

          <button
            type="submit"
            class="ml-auto h-full bg-amber-400 px-4 hover:bg-yellow-300"
          >
            Search
          </button>
        </form>
        <ul class="text-center font-medium">
          <li class="py-2"><a href="{{url('/')}}">Home</a></li>
          <li class="py-2"><a href="{{url('/contact')}}">Contact Us</a></li>
        </ul>
      </div>
    </section>
    <!-- /Burger menu  -->

    <!-- Nav bar -->
    <!-- hidden on small devices -->

    <nav class="relative bg-violet-900">
      <div
        class="mx-auto hidden h-12 w-full max-w-[1200px] items-center md:flex"
      >
         

        <div class="mx-7 flex gap-8">
          <a
            class="border-b border-amber-400  font-light text-white duration-100 hover:text-yellow-400"
            href="{{url('/')}}"
            >Home</a
          >
          <a
            class="font-light text-white duration-100 hover:text-yellow-400 hover:underline"
            href="{{url('/contact')}}"
            >Contact Us</a
          >
        </div>


      </div>
    </nav>
    <!-- /Nav bar -->

    <div class="min-h-svh">
    @yield('content')
    </div>

    
    <!-- Desktop Footer  -->

    <footer
      class="mx-auto border-t-2 w-full max-w-[1200px] justify-between pb-10 flex flex-col lg:flex-row"
    >
      <div class="ml-5">
        <img
          class="mt-10 mb-5"
          src="./assets/images/company-logo.svg"
          alt="company logo"
        />
        <p class="pl-0">
          Lorem ipsum dolor sit amet consectetur <br />
          adipisicing elit.
        </p>
        <div class="mt-10 flex gap-3">
          <a href="https://github.com/bbulakh">
            <img
              class="h-5 w-5 cursor-pointer"
              src="./assets/images/github.svg"
              alt="github icon"
            />
          </a>
          <a href="https://t.me/b_bulakh">
            <img
              class="h-5 w-5 cursor-pointer"
              src="./assets/images/telegram.svg"
              alt="telegram icon"
            />
          </a>
          <a href="https://www.linkedin.com/in/bogdan-bulakh-393284190/">
            <img
              class="h-5 w-5 cursor-pointer"
              src="./assets/images/linkedin.svg"
              alt="twitter icon"
            />
          </a>
        </div>
      </div>

      <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="mx-5 mt-10">
          <p class="font-medium text-gray-500">FEATURES</p>
          <ul class="text-sm leading-8">
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Commerce</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Merchendise</a></li>
          </ul>
        </div>

        <div class="mx-5 mt-10">
          <p class="font-medium text-gray-500">SUPPORT</p>
          <ul class="text-sm leading-8">
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Docs</a></li>
            <li><a href="#">Audition</a></li>
            <li><a href="#">Art Status</a></li>
          </ul>
        </div>

        <div class="mx-5 mt-10">
          <p class="font-medium text-gray-500">DOCUMENTS</p>
          <ul class="text-sm leading-8">
            <li><a href="#">Terms</a></li>
            <li><a href="#">Conditions</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">License</a></li>
          </ul>
        </div>

        <div class="mx-5 mt-10">
          <p class="font-medium text-gray-500">DELIVERY</p>
          <ul class="text-sm leading-8">
            <li><a href="#">List of countries</a></li>
            <li><a href="#">Special information</a></li>
            <li><a href="#">Restrictions</a></li>
            <li><a href="#">Payment</a></li>
          </ul>
        </div>
      </div>
    </footer>
    <!-- /Desktop Footer  -->

    <!-- Payment and copyright  -->

    <section class="h-11 bg-amber-400">
      <div
        class="mx-auto flex max-w-[1200px] items-center justify-between px-4 pt-2"
      >
        <p>&copy; StarCity, {{date('Y')}}</p>
        <div class="flex items-center space-x-3">
          <img
            class="h-8"
            src="https://cdn-icons-png.flaticon.com/512/5968/5968299.png"
            alt="Visa icon"
          />
          <img
            class="h-8"
            src="https://cdn-icons-png.flaticon.com/512/349/349228.png"
            alt="AE icon"
          />
          <img
            class="h-8"
            src="https://cdn-icons-png.flaticon.com/512/5968/5968144.png"
            alt="Apple pay icon"
          />
        </div>
      </div>
    </section>
    <!-- /Payment and copyright  -->

    <livewire:toastComponent />


    @livewireScripts

    <script>
        function scrollToElement(elementId) {
            const element = document.getElementById(elementId);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
    </script>

    

  </body>
</html>
