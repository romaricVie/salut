<x-guest-layout>
    <x-slot name="title">Connexion réseau social Chretien</x-slot>

    <main class="w-full h-screen sm:grid sm:place-items-center bg-white relative px-3 pt-8 pb-4">
        

        <section class="w-full max-w-sm">
            <section class="select-none text-center mb-10 sm:mb-16">
                <a href="{{ route('welcome') }}" class="text-lg text-red-700 leading-none font-bold">
                    <img src="{{asset('/images/logo.svg')}}" alt="logo affranchie" class="w-auto h-20 inline">
                </a>
            </section>

            <x-jet-authentication-card>
                <x-jet-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="max-w-xs mx-auto border-t border-gray-400 pt-8 sm:pt-12 relative">
                    @csrf

                    <div class="w-16 h-16 sm:w-24 sm:h-24 grid place-items-center p-2 rounded-full absolute top-0 transform -translate-x-1/2 -translate-y-1/2 border border-gray-400 z-10 bg-white __circle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 sm:w-16 sm:h-16 text-gray-500" focusable="false" role="img" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><circle fill="none" cx="12" cy="7" r="3"></circle><path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z"></path></svg>
                    </div>

                    <h1 class="text-gray-900 font-extrabold text-base sm:text-lg text-center mb-8">Se connecter à Affranchie</h1>

                    <div>
                        <x-jet-label for="email" value="{{ __('Adresse Email') }}" class="font-bold text-gray-900" />
                        <x-jet-input 
                            id="email" 
                            class="w-full"
                            type="email" name="email" 
                            :value="old('email')" 
                            aria-placeholder="Entrer votre e-mail" 
                            required 
                            autofocus 
                        />
                    </div>

                    <div class="mt-4">
                        <x-jet-label 
                            for="password" 
                            value="{{ __('Mot de passe') }}" 
                            class="font-bold text-gray-900 float-left mb-1" 
                        />
                        <a 
                            class="text-xs text-blue-600 float-right hover:text-blue-700 focus:text-blue-700 focus:outline-none" 
                            href="{{ route('password.request') }}"
                        >
                            {{ __('Mot de passe oublié ?') }}
                        </a>
                        <x-jet-input 
                            id="password" 
                            class="clear-both w-full" 
                            type="password" name="password" 
                            required 
                            aria-placeholder="Entrer votre mot de passe" 
                            autocomplete="current-password" 
                        />
                    </div>

                    <div class="flex items-center mt-4">
                        <input id="remember_me" type="checkbox" class="form-checkbox ml-1" name="remember">
                        <label for="remember_me" class="ml-2 text-sm font-thin">{{ __('Se souvenir de moi') }}</label>
                    </div>

                    <button 
                        type="submit" 
                        class="block w-full mx-auto mt-6 bg-red-600 p-2 rounded-md text-sm text-white font-semibold hover:bg-red-700 focus:bg-red-700"
                    >
                        {{ __('Je me connecte') }}
                    </button>

                    <p class="mt-4 text-xs sm:text-sm font-thin text-center">Pas encore membre ? <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 focus:text-blue-700 focus:outline-none">S'inscrire maintenant</a></p>
                </form>
            </x-jet-authentication-card>
        </section>

        <p class="w-full text-xs text-gray-500 text-center absolute bottom-0 left-0 py-2">&copy; {{date('Y')}} <img src="{{asset('/images/logo-texte.svg')}}" alt="logo affranchie" class="w-auto h-8 inline ml-2"></p>
    </main>


    <!-- SCRIPTS -->
    <!-- Suppression du footer -->
    <script type="text/javascript" src="{{asset('/assets/js/removeFooter.js')}}"></script>
</x-guest-layout>
