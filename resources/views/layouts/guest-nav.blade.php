<nav class="bg-sky-800 border-gray-200 px-2 sm:px-4 py-4">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="/" class="flex items-center">
            <img src="{{asset('img/logo-white.png')}}" class="mr-3 h-8" alt="logo">
        </a>
        <div class="mega-menu-full hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
            <ul
                class="font-body flex flex-col md:items-center text-white text-sm md:text-md mt-4 rounded-lg md:flex-row md:space-x-10 md:mt-0 md:font-medium md:border-0">
                <li>
                    <a href="{{route('login')}}" class="block py-2 px-3">Login</a>
                </li>
                <li>
                    <a href="{{route('register')}}" class="block py-2 px-3">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
