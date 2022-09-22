<nav class="bg-sky-800 border-gray-200 px-2 sm:px-4 py-4">
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
            <div class="font-body hidden z-50 my-4 text-base list-none bg-gray-800 divide-y border-b" id="user-dropdown"
                data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom"
                style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 210px);">
                <div class="py-3 px-4">
                    <span class="block text-sm text-gray-900 dark:text-white">{{$user->name}}</span>
                    <span
                        class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{$user->email}}</span>
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
                        <a class="" href="{{ route('logout') }}">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Iesire din cont
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
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
        <div class="mega-menu-full hidden justify-between items-center w-full md:flex md:w-auto md:order-1"
            id="mobile-menu-2">
            <ul
                class="font-body flex flex-col md:items-center text-white text-sm md:text-md mt-4 rounded-lg md:flex-row md:space-x-10 md:mt-0 md:font-medium md:border-0">
                <li>
                    <button id="mega-menu-full-dropdown-button" data-collapse-toggle="mega-menu-full-dropdown"
                        class="px-3 flex justify-between items-center py-2 w-full font-medium text-white rounded md:w-auto hover:bg-gray-100 md:hover:bg-gray-500 md:border-0 md:hover:text-blue-500 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Emitere
                        <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg></button>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3">Rapoarte</a>
                </li>
                <li>
                    <button id="mega-menu-full-dropdown-button-2" data-collapse-toggle="mega-menu-full-dropdown-2"
                        class="px-3 flex justify-between items-center py-2 w-full font-medium text-white rounded md:w-auto hover:bg-gray-100 md:hover:bg-gray-500 md:border-0 md:hover:text-blue-500 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Setari
                        <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg></button>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- Dropdown Emitere --}}
<div id="mega-menu-full-dropdown"
    class="hidden mt-1 bg-gray-800 border-gray-200 shadow-sm border-y dark:border-gray-600">
    <div class="font-body grid py-5 mx-auto container text-gray-800 dark:text-white sm:grid-cols-2">
        <ul>
            <li>
                <a href="{{route('account.factura')}}" class="block p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="font-semibold">Factura</div>
                    <span class="text-sm font-light text-gray-500 dark:text-gray-400">Emite Facturi simplu si
                        rapid.</span>
                </a>
            </li>
            <li>
                <a href="#" class="block p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="font-semibold">Factura Storno</div>
                    <span class="text-sm font-light text-gray-500 dark:text-gray-400">Emite Facturi Storno simplu si
                        rapid.</span>
                </a>
            </li>
            <li>
                <a href="#" class="block p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="font-semibold">Proforma</div>
                    <span class="text-sm font-light text-gray-500 dark:text-gray-400">Emite Proforme simplu si
                        rapid.</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="#" class="block p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="font-semibold">Aviz</div>
                    <span class="text-sm font-light text-gray-500 dark:text-gray-400">Emite Avize simplu si
                        rapid.</span>
                </a>
            </li>
            <li>
                <a href="#" class="block p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="font-semibold">Factura Recurenta</div>
                    <span class="text-sm font-light text-gray-500 dark:text-gray-400">Emite Facturi Recurente simplu si
                        rapid.</span>
                </a>
            </li>
            <li>
                <a href="#" class="block p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="font-semibold">Proforma Recurenta</div>
                    <span class="text-sm font-light text-gray-500 dark:text-gray-400">Emite Proforme Recurente simplu si
                        rapid.</span>
                </a>
            </li>
        </ul>
    </div>
</div>

{{-- Dropdown Setari --}}
<div id="mega-menu-full-dropdown-2"
    class="hidden mt-1 bg-gray-800 border-gray-200 shadow-sm border-y dark:border-gray-600">
    <div class="font-body grid py-5 mx-auto container text-gray-800 dark:text-white sm:grid-cols-2">
        <ul>
            <li>
                <a href="{{route('account.date-cont')}}"
                    class="flex items-center p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="mr-3 fill-white">
                        <path d="M8 14h11v2H8Zm0 5h13v2H8Z" />
                        <path
                            d="M28 4H4a2 2 0 0 0-2 2v20a2 2 0 0 0 2 2h24a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 2v2H4V6ZM4 26V10h24v16Z" />
                        <path fill="none" data-name="&lt;Transparent Rectangle&gt;" d="M0 0h32v32H0z" />
                    </svg>
                    <div class="content">
                        <div class="font-semibold">Date Cont</div>
                        <span class="text-sm font-light text-gray-500 dark:text-gray-400">Schimba datele contului de
                            utilizator.</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{route('account.date-firma')}}"
                    class="flex items-center p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32"
                        class="fill-white mr-3">
                        <path
                            d="M6.5 10h-2v7h2v-7zm6 0h-2v7h2v-7zm8.5 9H2v2h19v-2zm-2.5-9h-2v7h2v-7zm-7-6.74L16.71 6H6.29l5.21-2.74m0-2.26L2 6v2h19V6l-9.5-5z" />
                    </svg>
                    <div class="content">
                        <div class="font-semibold">Date Firma</div>
                        <span class="text-sm font-light text-gray-500 dark:text-gray-400">Schimba datele firmei
                            facturante.</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{route('account.date-bancare')}}"
                    class="flex items-center p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32"
                        class="fill-white mr-3">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                            d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm17 8H4v8h16v-8zm0-2V5H4v4h16zm-6 6h4v2h-4v-2z" />
                    </svg>
                    <div class="content">
                        <div class="font-semibold">Conturi Bancare</div>
                        <span class="text-sm font-light text-gray-500 dark:text-gray-400">Schimba contul bancar asociat
                            firmei.</span>
                    </div>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="{{route('account.date-clienti')}}" class="flex items-center p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" class="fill-white mr-3"><path d="M16.67 13.13C18.04 14.06 19 15.32 19 17v3h4v-3c0-2.18-3.57-3.47-6.33-3.87zM15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4c-.47 0-.91.1-1.33.24a5.98 5.98 0 0 1 0 7.52c.42.14.86.24 1.33.24zm-6 0c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2zm0 7c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm6 5H3v-.99C3.2 16.29 6.3 15 9 15s5.8 1.29 6 2v1z"/></svg>
                    <div class="content">
                        <div class="font-semibold">Clienti</div>
                        <span class="text-sm font-light text-gray-500 dark:text-gray-400">Adauga clientii tai.</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" class="fill-white mr-3"><path fill="none" d="M0 0h24v24H0z"/><path d="m8.646 17.26 3.392 2.162 3.392-2.161 1.86 1.185-5.252 3.346-5.252-3.346 1.86-1.185zm-.877-8.28 2.393-1.553-2.425-1.574L5.28 7.37l2.49 1.61zm1.84 1.19L12 11.719l2.39-1.547L12 8.619l-2.391 1.552zm4.231 2.74 2.424 1.568 2.45-1.502-2.485-1.612-2.389 1.545zM12 6.234l4.237-2.748L22.46 7.33l-4.392 2.843 4.393 2.85-6.226 3.819L12 14.1l-4.235 2.74-6.23-3.817 4.396-2.851L1.539 7.33l6.224-3.843L12 6.235zm1.837 1.192L16.23 8.98l2.489-1.61-2.456-1.517-2.426 1.574zM10.16 12.91l-2.39-1.546-2.486 1.613 2.451 1.502 2.425-1.569z"/></svg>
                    <div class="content">
                        <div class="font-semibold">Produse</div>
                        <span class="text-sm font-light text-gray-500 dark:text-gray-400">Adauga produsele tale.</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="block p-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="font-semibold">Model Factura</div>
                    <span class="text-sm font-light text-gray-500 dark:text-gray-400">Modifica factura dupa placul
                        tau.</span>
                </a>
            </li>
        </ul>
    </div>
</div>