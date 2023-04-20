@guest
    <nav class="flex items-center justify-between p-2">
        <div>
            <a href="{{route('welcome')}}" class="text-sm sm:text-xl fontmedium sm:font-bold text-red-700">
                <img class="h-16 sm:h-16 md:h-16" src="{{asset('/images/logo.svg')}}" alt="logo">
            </a>
        </div>

        <div x-data="{}" x-cloak class="flex items-center pr-3 md:pr-10 space-x-2">
            <a href="{{ route('login') }}" 
                class="text-xs sm:text-sm px-3 py-1 lg:py-2 rounded border border-transparent sm:text-gray-600 font-semibold bg-gray-200 text-gray-900 border-gray-200 sm:bg-transparent sm:border-transparent" 
                :class="{ 'hover:bg-gray-200 hover:text-gray-900 hover:border-gray-200' : window.innerWidth >= 640}"
            >
                <span class="hidden sm:inline">Je me connecte</span>
                <span class="sm:hidden">connexion</span>
            </a>

            <a href="{{ route('register') }}" class="hidden sm:block text-sm px-3 py-1 lg:py-2 rounded border border-red-600 text-red-600 font-semibold hover:bg-red-600 hover:text-white">Je m'inscris</a>

            <a href="{{route('don.show')}}" class="flex items-center text-xs sm:text-sm px-3 py-1 lg:py-2 rounded border border-blue-500 text-white font-semibold bg-blue-500 hover:bg-blue-600">
                <span class="hidden sm:block leading-tight">Je fais don</span>
                <span class="sm:hidden leading-tight">Don</span>
                <svg class="w-4 h-4 lg:w-5 lg:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                </svg>
            </a>
        </div>
    </nav>
@endguest