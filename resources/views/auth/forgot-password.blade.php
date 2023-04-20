<x-guest-layout>
    <main class="w-full h-screen sm:grid sm:place-items-center bg-white relative px-3 pt-8 pb-4">
        <section class="w-full max-w-sm">
            <section class="select-none text-center mb-10 sm:mb-16">
                <a href="{{ route('welcome') }}" class="text-lg text-red-700 leading-none font-bold">
                    <img src="{{asset('/images/logo.svg')}}" alt="logo affranchie" class="w-auto h-20 inline">
                </a>
            </section>

            <h1 class="max-w-xs flex items-start rounded px-3 py-2 bg-blue-100 text-gray-900 text-sm sm:text-base mb-6 relative">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1 flex-shrink-0">
                    <path d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.514,2,12,2z M12,20c-4.411,0-8-3.589-8-8s3.589-8,8-8 s8,3.589,8,8S16.411,20,12,20z"></path><path d="M11 11H13V17H11zM11 7H13V9H11z"></path>
                </svg>
                <span>{{ __('Mot de passe oublié ? Aucun problème! Faites-nous simplement savoir votre adresse e-mail et nous vous enverrons par e-mail un lien de réinitialisation de mot de passe qui vous permettra d\'en choisir un nouveau.') }}</span>
            </h1>


            <x-jet-authentication-card>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.email') }}" class="max-w-xs">
                    @csrf

                    <div class="block">
                        <x-jet-label for="email" value="{{ __('Adresse Email') }}" />
                        <x-jet-input 
                            id="email" 
                            class="block mt-1 w-full" 
                            type="email" name="email" 
                            :value="old('email')" 
                            aria-placeholder="Entrez votre adresse e-mail" 
                            required 
                            autofocus 
                        />
                    </div>

                    <button 
                            type="submit" 
                            class="block w-full mx-auto mt-6 bg-red-600 p-2 rounded-md text-xs sm:text-sm text-white font-semibold hover:bg-red-700 focus:bg-red-700"
                        >
                            {{ __('Rénitialiser mon Mot de passe') }}
                    </button>
                </form>
            </x-jet-authentication-card>
        </section>

        <p class="w-full text-xs text-gray-500 text-center absolute bottom-0 left-0 py-2">&copy; {{date('Y')}} <img src="{{asset('/images/logo-texte.svg')}}" alt="logo affranchie" class="w-auto h-6 inline ml-2"></p>
    </main>


    <!-- SCRIPTS -->
    <!-- Suppression du footer -->
    <script type="text/javascript" src="{{asset('/assets/js/removeFooter.js')}}"></script>
</x-guest-layout>
