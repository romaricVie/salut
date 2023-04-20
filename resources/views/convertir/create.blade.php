<x-app-layout>
  <x-slot name="title">Jesus-Christ le meilleur choix pour la vie</x-slot>


  <section class="w-full min-h-screen relative bg-white" id="convertir">
    <div class="absolute top-0 left-0 w-full z-10 pt-4 pl-4 select-none">
      <a href="{{ route('dashboard') }}" class="text-lg text-red-700 font-bold">
        <img src="{{asset('/images/logo-img.svg')}}" alt="logo affranchie" class="w-auto h-8 inline">
      </a>
    </div>
    <!-- Banner -->
    <section 
      x-data="{}"
      x-cloak
      class="w-full bg-gray-300 relative page__banner"
      :class="{ '__xs' : window.innerWidth < 640 }"
    >
      <h1 class="max-w-lg text-center font-black text-lg absolute transform -translate-y-1/2 -translate-x-1/2 text-white md:text-xl banner__title">...Crois au Seigneur Jésus, et tu seras sauvé, toi et ta famille. (Actes 16:31)</h1>
    </section>

    <section class="py-10 px-2">
      <x-jet-validation-errors class="mb-4" />

      <form 
        method="POST" 
        action="{{route('convertir.store')}}" 
        enctype="multipart/form-data" 
        id="image-upload-preview" 
        class="max-w-screen-sm mx-auto grid sm:grid-cols-2 gap-3"
        x-data="{ isFocused: false }"
        x-cloak
      >
        @csrf

        
        <!--mail field-->
        <div class="col-span-1">
          <x-jet-label for="email" value="{{ __('Adresse Email') }}" />
          <x-jet-input 
            id="email" 
            class="w-full" 
            type="email" 
            name="email" 
            value="{{auth()->user()->email}}" 
            aria-placeholder="Entrez votre adresse e-mail" 
            required 
          />
        </div>

        <!--Phone field-->
        <div class="sm:col-span-1">
          <x-jet-label for="phone" value="{{ __('Téléphone') }}" />
          <x-jet-input 
            id="phone" 
            class="w-full" 
            type="tel" 
            name="phone" 
            value="{{auth()->user()->phone}}" 
            aria-placeholder="Entrez votre numéro de téléphone" 
            required 
            autocomplete="phone" 
          />
        </div>
        

        <!--pays field-->
        <div class="sm:col-span-1">
          <x-jet-label for="pays" value="{{ __('Pays *') }}" />
          <x-jet-input 
            id="pays" 
            class="w-full" 
            type="text" 
            name="pays" 
            :value="old('pays')" 
            aria-placeholder="Entrez votre adresse pays" 
            required 
          />
        </div>

        <!--ville field-->
        <div class="sm:col-span-1">
          <x-jet-label for="ville" value="{{ __('Ville *') }}" />
          <x-jet-input 
            id="ville" 
            class="w-full" 
            type="text" 
            name="ville" 
            :value="old('ville')" 
            aria-placeholder="Entrez votre ville" 
            required 
            autocomplete="ville" 
          />
        </div>

        
        <!--habitation field-->
        <div class="sm:col-span-2">
          <x-jet-label for="habitation" value="{{ __('Lieu habitation /quartier *') }}" />
          <x-jet-input 
            id="habitation" 
            class="w-full" 
            type="text" 
            name="habitation" 
            :value="old('habitation')" 
            aria-placeholder="Entrez votre lieu habitation"
            required 
          />
        </div>
        
        

        <div class="sm:col-span-2">
          <x-jet-label for="motivation" value="{{ __('Qu-est-ce qui vous motive à donner votre vie à Jésus-Christ ? *') }}" />
          <div 
            class="rounded-md border-transparent mt-1 overflow-hidden"
            :class="{ 'border border-red-400' : isFocused }"
          >
            <textarea
              id="motivation"
              name="motivation"
              class="w-full block resize-none rounded-md shadow-none bg-gray-200 font-haireline text-sm px-3 py-2 outline-none focus:bg-white "
              rows="6"
              aria-placeholder="Entrez votre sujet"
              @focusin="isFocused = true"
              @focusout="isFocused = false"
            >{{old('motivation')?? old('motivation')}}</textarea>
          </div>
        </div>

        <!-- Upload image -->
        <div class="mb-4 sm:col-span-2">
          <h3 class="text-gray-800 font-bold mb-1">Ajouter votre photo</h3>
          <div 
            x-data="{ hasImage: false }"
            x-cloak
            class="block w-full h-40 rounded grid place-items-center overflow-y-auto relative"
            :class="{
                      'border-dashed border-4 bg-gray-200' : !hasImage,
                      'border-solid border-2 border-gray-300' : hasImage,
                    }"
            id="preview__image"
          >
            <input 
              type="file" 
              class="hidden"
              x-ref="fileInput"
              id="image" 
              name="image"
              accept="image/*" 
              required
              @change="hasImage = ($event.target.files.length > 0)? true : false"
            >

            <template x-if="hasImage">
              <img id="preview-image" src="" alt="" class="max-w-full h-auto">
            </template>

            <button
            class="text-gray-600 transition duration-100 ease-in focus:border-solid focus:border"
              :class="{ 'bg-white p-2 rounded-md hover:bg-gray-300' : !hasImage,
                        'bg-gray-200 px-2 py-1 hover:bg-gray-300 rounded absolute top-0 right-0 transform translate-y-1 -translate-x-1 leading-none' : hasImage,
                      }"
              x-on:click.prevent="$refs.fileInput.click()"
            >
              <span x-show="hasImage" x-cloak class="text-xs font-semibold">changer l'image</span>
              <svg x-show="!hasImage" x-cloak class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </button>
          </div>
        </div>

        <button 
          type="submit" 
          class="sm:col-span-2 place-self-center flex items-center justify-center mt-6 bg-red-600 py-2 px-5 rounded-md text-sm text-white font-semibold hover:bg-red-700 focus:bg-red-700"
        >{{ __('J\'accepte Jésus-Christ') }}</button>
      </form>
    </section>
       
  </section> 

  <footer class="py-2 px-3 md:pr-0 lg:pl-20">
    <div class="flex flex-col md:flex-row items-center justify-center text-sm md:justify-start">
      <div>
        <a href="" class="mx-1">Facebook</a> <a href="" class="mx-1">Twitter</a> <a href="" class="mx-1">Youtube</a>
      </div>
      <p class="md:ml-3"><img src="{{asset('/images/logo-texte.svg')}}" alt="logo affranchie" class="w-auto h-6 inline"> &copy; 2021 - Tous droits réservés</p>
    </div>
  </footer>


  <!-- SCRIPTS -->
  <script type="text/javascript">
    $('#image').change(function(){            
      let reader = new FileReader();
      reader.onloadend = (e) => { 
        $('#preview-image').attr('src', e.target.result); 
      }
      reader.readAsDataURL(this.files[0]);
    });
  </script>

  <!-- Suppression les menu du haut et de gauche -->
  <script type="text/javascript" src="{{asset('/assets/js/removeMenus.js')}}"></script>
    
</x-app-layout>




