<nav class="bg-sky-800 border-gray-200 px-2 sm:px-4 py-2">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="/" class="flex items-center">
            <img src="{{asset('img/logo-white.png')}}" class="mr-3 h-8" alt="logo">
        </a>
        <div class="flex items-center md:order-2">
            <button type="button"
                class="flex mr-3 text-sm bg-white rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="sm:w-8 sm:h-8 w-6 h-6 rounded-full" src="{{asset('img/user.png')}}" alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div class="font-body hidden z-50 my-4 text-base list-none bg-gray-800 divide-y border-b"
                id="user-dropdown" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom"
                style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 210px);">
                <div class="py-3 px-4">
                    <span class="block text-sm text-gray-900 dark:text-white">Hosszu Zsolt</span>
                    <span
                        class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">zsoltibv@gmail.com</span>
                </div>
                <ul class="py-1" aria-labelledby="user-menu-button">
                    <li>
                        <a href="#"
                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Setari</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Facturi</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Iesire din cont</a>
                    </li>
                </ul>
            </div>
            <button data-collapse-toggle="mobile-menu-2" type="button"
                class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="white" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="mega-menu-full hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
            <ul
                class="font-body flex flex-col md:items-center text-white text-sm md:text-md mt-4 rounded-lg md:flex-row md:space-x-10 md:mt-0 md:font-medium md:border-0">
                <li>
                    <button id="mega-menu-full-dropdown-button" data-collapse-toggle="mega-menu-full-dropdown" class="px-3 flex justify-between items-center py-2 w-full font-medium text-white rounded md:w-auto hover:bg-gray-100 md:hover:bg-gray-500 md:border-0 md:hover:text-blue-500 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Emitere <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3">Rapoarte</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3">Setari</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- Dropdown Emitere --}}
<div id="mega-menu-full-dropdown" class="hidden mt-1 bg-gray-800 border-gray-200 shadow-sm border-y dark:border-gray-600">
    <div class="font-body grid py-5 px-4 mx-auto max-w-screen-md text-gray-800 dark:text-white sm:grid-cols-2 md:px-6">
        <ul>
            <li>
                <a href="{{route('account.factura')}}" class="block p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="font-semibold">Factura</div>
                    <span class="text-sm font-light text-gray-500 dark:text-gray-400">Emite Facturi in 5 minute.</span>
                </a>
            </li>
            <li>
                <a href="#" class="block p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="font-semibold">Factura Storno</div>
                    <span class="text-sm font-light text-gray-500 dark:text-gray-400">Emite Facturi Storno in 5 minute.</span>
                </a>
            </li>
            <li>
                <a href="#" class="block p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="font-semibold">Proforma</div>
                    <span class="text-sm font-light text-gray-500 dark:text-gray-400">Emite Proforme in pasi simpli.</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="#" class="block p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="font-semibold">Aviz</div>
                    <span class="text-sm font-light text-gray-500 dark:text-gray-400">Emite Avize cat ai zice "facturila".</span>
                </a>
            </li>
            <li>
                <a href="#" class="block p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="font-semibold">Factura Recurenta</div>
                    <span class="text-sm font-light text-gray-500 dark:text-gray-400">Emite Facturi Recurente pentru clientii tai.</span>
                </a>
            </li>
            <li>
                <a href="#" class="block p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="font-semibold">Proforma Recurenta</div>
                    <span class="text-sm font-light text-gray-500 dark:text-gray-400">Emite Proforme Recurente simplu si rapid.</span>
                </a>
            </li>
        </ul>
    </div>
</div>