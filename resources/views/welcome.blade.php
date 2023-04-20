<x-guest-layout>
  <x-slot name="title">Bienvenue sur le réseau social Chretien</x-slot>
    <header class="w-full absolute top-0 left-0 sm:pl-3 md:pl-12 xl:pl-24 py-3">
       @include('partials/_nav')
    </header>
    <main 
      class="w-full bg-white px-2 overflow-hidden" 
    >

      <article x-data="{}" x-cloak class="h-auto pb-6 pt-20 xl:h-screen w-full sm:pl-3 md:pl-12 xl:pl-24 flex flex-col-reverse items-center sm:flex-row sm:items-center">
        <div class="w-full max-w-xl text-left">
          <h1 class="text-red-600 tracking-tight leading-tight mb-3 sm:mb-6 text-center sm:text-left text-xl md:text-2xl lg:text-4xl xl:text-5xl font-bold md:font-extrabold">Bienvenue sur Affranchie,<br/>votre réseau social dédié à l'évangélisation et à l'enseignement.</h1>
          @guest
          <p class="font-semibold text-sm sm:text-base text-center sm:text-left lg:text-lg xl:text-xl text-gray-600">Réjoinez-nous maintenant en cliquant sur <a href="{{route('register')}}" class="inline-block sm:inline bg-red-600 sm:bg-transparent text-white sm:text-gray-600 px-2 py-1 sm:p-0 rounded-sm sm:rounded-none text-xs sm:text-base sm:font-semibold lg:text-lg xl:text-xl" :class="{ 'hover:underline hover:text-red-700' : window.innerWidth >= 640}">je m'inscris</a></p>
         @endguest
         @auth
          <p class="font-semibold text-sm sm:text-base text-center sm:text-left lg:text-lg xl:text-xl text-gray-600">Réjoinez-nous maintenant en cliquant sur <a href="{{route('dashboard')}}" class="inline-block sm:inline bg-red-600 sm:bg-transparent text-white sm:text-gray-600 px-2 py-1 sm:p-0 rounded-sm sm:rounded-none text-xs sm:text-base sm:font-semibold lg:text-lg xl:text-xl" :class="{ 'hover:underline hover:text-red-700' : window.innerWidth >= 640}">connexion</a></p>
         @endauth

        </div>

        <div class="w-full max-w-sm mx-auto sm:max-w-full">
          <img 
            src="{{asset('/images/welcome.svg')}}" 
            alt="image de jeunes, hommes et femmes, en joie"
            class="w-full object-center object-cover" 
          >
        </div>
      </article> 
    </main>
</x-guest-layout>
