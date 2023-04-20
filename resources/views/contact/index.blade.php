<x-guest-layout>
	 <x-slot name="title">Nous contacter</x-slot>
 
  <main 
    x-data="{ isFocused: false }"
    x-cloak 
    class="w-full h-screen bg-white flex"
  >
    <section class="hidden sm:flex flex-col border w-full max-w-xs md:max-w-md bg-red-700 py-3 px-2 relative">
      <section class="select-none mt-10 ml-2 md:ml-4">
        <a href="{{ route('dashboard') }}" class="text-lg text-red-400 hover:text-gray-200 font-bold">
          <img src="{{asset('/images/logo-texte.svg')}}" alt="logo affranchie" class="w-auto h-10 inline">
        </a>
      </section>
      <section class="mt-2 ml-2 md:ml-4">
        <h1 class="text-gray-200 text-xl md:text-3xl font-bold leading-tight">Souhaitez-vous nous parler ?</h1>
        <p class="text-gray-200 text-sm md:text-lg font-light">Dites-nous tout en remplissant le formulaire ci-contre.</p>
      </section>
      <img src="{{asset('/images/contact.svg')}}" alt="..." class="w-full">
      <p class="w-full text-sm text-gray-200 absolute bottom-0 left-0 pb-6 pl-4 md:pl-6">&copy; {{date('Y')}} <img src="{{asset('/images/logo-texte.svg')}}" alt="logo affranchie" class="w-auto h-6 inline ml-2"></p>
    </section>

    <section class="w-full sm:grid place-items-center py-4 px-3 text-gray-600 relative">

      <section class="sm:hidden select-none text-center mb-1">
        <a href="{{ route('dashboard') }}" class="text-lg text-red-700 leading-none font-bold">
          <img src="{{asset('/images/logo.svg')}}" alt="logo affranchie" class="w-auto h-12 inline">
        </a>
      </section>
      <h1 class="sm:hidden text-center text-gray-900 font-bold mb-6 text-lg leading-none">Contactez-nous</h1>

      <x-jet-authentication-card>
        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{route('contacts.store')}}" class="w-full max-w-md mx-auto">
          @csrf

          <section class="w-full grid grid-cols-2 sm:place-content-center gap-2 mb-2 sm:mb-4">
              <!--Name field-->
              <div>
                  <x-jet-label for="name" value="{{ __('Nom') }}" />
                  <x-jet-input 
                      id="name" 
                      class="w-full" 
                      type="text" 
                      name="name" 
                      :value="old('name')" 
                      aria-placeholder="Entrez votre nom" 
                      required 
                      autofocus 
                      autocomplete="name" 
                  />
              </div>
              <!--FirstName field-->
              <div>
                  <x-jet-label for="firstname" value="{{ __('Prénoms') }}" />
                  <x-jet-input 
                      id="firstname" 
                      class="w-full" 
                      type="text" 
                      name="firstname" 
                      :value="old('firstname')" 
                      aria-placeholder="Entrez votre prenoms" 
                      required  
                      autocomplete="firstname" 
                  />
              </div>
          </section>

          <section class="grid grid-cols-2 sm:grid-cols-3 place-content-center gap-2 mb-2 sm:mb-4">
              <!--mail field-->
              <div class="sm:col-span-2">
                  <x-jet-label for="email" value="{{ __('Adresse Email') }}" />
                  <x-jet-input 
                      id="email" 
                      class="w-full" 
                      type="email" 
                      name="email" 
                      :value="old('email')" 
                      aria-placeholder="Entrez votre adresse e-mail" 
                      required 
                  />
              </div>
              <!--Phone field-->
              <div class="col-span-1">
                  <x-jet-label for="phone" value="{{ __('Téléphone') }}" />
                  <x-jet-input 
                      id="phone" 
                      class="w-full" 
                      type="tel" 
                      name="phone" 
                      :value="old('phone')" 
                      aria-placeholder="Entrez votre numéro de téléphone" 
                      required 
                      autocomplete="phone" 
                  />
              </div>
          </section>

          <section class="mb-2 sm:mb-4">
            <x-jet-label for="objet" value="{{ __('Objet') }}" />
            <x-jet-input 
                id="objet" 
                class="w-full" 
                type="text" 
                name="objet" 
                :value="old('objet')" 
                aria-placeholder="Entrez l'objet de votre message" 
                required
            />
          </section>

          <section>
            <x-jet-label for="message" value="{{ __('Message') }}" />
            <div 
              class="rounded-md border-transparent mt-1 overflow-hidden"
              :class="{ 'border border-red-400' : isFocused }"
            >
              <textarea
                id="message"
                name="message"
                class="w-full block resize-none rounded-md shadow-none bg-gray-200 font-haireline text-sm px-3 py-2 outline-none focus:bg-white"
                rows="6"
                aria-placeholder="Entrez votre message"
                @focusin="isFocused = true"
                @focusout="isFocused = false"
              ></textarea>
            </div>
          </section>

          <button 
            type="submit" 
            class="block max-w-xs flex items-center justify-center mx-auto sm:mr-auto mt-6 bg-red-600 py-2 px-3 sm:px-5 rounded-md text-xs sm:text-sm text-white font-semibold hover:bg-red-700 focus:bg-red-700"
          >
            <span>{{ __('J\'envoie mon message') }}</span>
            <svg class="w-4 h-4 sm:w-5 sm:h-5 transform rotate-90 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
            </svg>
          </button>
        </form>
      </x-jet-authentication-card>

      <p class="md:hidden w-full text-xs text-gray-500 text-center absolute bottom-0 left-0 py-2">&copy; {{date('Y')}} <img src="{{asset('/images/logo-texte.svg')}}" alt="logo affranchie" class="w-auto h-6 inline ml-2"></p>
    </section>
  </main>


  <!-- SCRIPTS -->
  <!-- Suppression du footer -->
  <script type="text/javascript" src="{{asset('/assets/js/removeFooter.js')}}"></script>
</x-guest-layout>
