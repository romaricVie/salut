<x-app-layout>
  <x-slot name="title">Faire une demande de prière</x-slot>

  <section 
    x-data="{ isFocused: false }" 
    x-cloak
    class="px-3 py-8 grid place-items-center text-gray-600"
  >

    <form method="POST" action="{{route('priere.store')}}" enctype="multipart/form-data" id="image-upload-preview" class="max-w-md bg-white px-3 py-5 rounded-md">
      @csrf
      <x-jet-validation-errors class="mb-4" />
      <h1 class="text-center text-gray-900 font-bold mb-8 text-lg sm:text-xl">Prière personnelle</h1>

      <section class="grid grid-cols-2 sm:grid-cols-3 place-content-center gap-1 sm:gap-2 mb-2 sm:mb-4">
          <!--mail field-->
          <div class="col-span-1 sm:col-span-2">
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
          <div class="col-span-1">
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
      </section>

      <section class="mb-2 sm:mb-4">
        <x-jet-label for="subject" value="{{ __('Sujet de prière') }}" />
        <div 
          class="rounded-md border border-transparent mt-1 overflow-hidden"
          :class="{ 'border-red-400' : isFocused }"
        >
          <textarea
            id="subject"
            name="subject"
            class="w-full block resize-none rounded-md shadow-none bg-gray-200 font-haireline text-sm px-3 py-2 outline-none focus:bg-white "
            rows="6"
            aria-placeholder="Entrez votre sujet"
            @focusin="isFocused = true"
            @focusout="isFocused = false"
            required
          >{{old('subject')?? old('subject')}}</textarea>
        </div>
      </section>

      <!-- Ajouter photo -->
      <div class="mb-2 sm:mb-4">
        <h3 class="text-gray-800 text-xs sm:text-sm font-bold mb-1">Ajouter votre photo</h3>
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
        class="block max-w-xs mx-auto mt-8 bg-red-600 py-2 px-3 sm:px-5 rounded sm:rounded-md text-xs sm:text-sm text-white font-semibold hover:bg-red-700 focus:bg-red-700"
      >
        <span>{{ __('Demander la prière') }}</span>
      </button>

    </form>
  </section>

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
</x-app-layout>




