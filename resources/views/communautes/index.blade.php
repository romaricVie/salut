<x-app-layout>
    <x-slot name="title">Pages communautes</x-slot>

   <!--Members-->
   <div>
     <section 
        x-data="placeSubmenu()"
        x-cloak
        class="pt-2 pb-4 px-1 sm:pt-4 sm:pb-0 sm:px-4"
        id="members" 
    >
        <section 
            class="max-w-screen-xl mx-auto rounded p-2 bg-white flex items-center justify-between md:p-3"
            @scroll.window="setAtTop"
            @resize.window="setAtTop"
            :class="{
                      'max-w-full fixed at__top px-1 sm:px-3' : atTop,
                      'xl__at__top shadow' : (window.outerWidth >= 1280  && atTop),
                      'lg__at__top shadow' : (window.outerWidth >= 1024 && 1280 > window.outerWidth && atTop),
                      'sm__at__top shadow' : (window.outerWidth >= 640 && 1024 > window.outerWidth && atTop),
                      'xs__at__top shadow' : (640 > window.outerWidth && atTop)
                    }"
        >
           <div
          x-data="{ isActive: false, isFocused: false }"
          x-cloak
        >
          <button 
            class="inline-flex items-baseline bg-red-500 rounded py-2 px-2 lg:px-4 font-semibold text-xs lg:text-sm text-white mr-2 transform scale-100 transition duration-300 ease-out hover:bg-red-600 hover:scale-110"
            @click="isActive = !isActive; $nextTick(() => {$refs.name.focus()});"
          >
            <span>Créer Page</span>
          </button>

          <div 
            class="py-8 px-3"
            :class="{
                      'w-screen h-screen fixed top-0 left-0 bg-black bg-opacity-25 z-50' : isActive,
                    }"
            x-show="isActive"
            x-cloak
          >
            <span class="p-2 text-gray-800 font-bold text-sm lg:text-base absolute top-0 right-0 transform translate-y-1 lg:translate-y-2 -translate-x-2 lg:-translate-x-6 cursor-pointer select-none bg-transparent hover:bg-red-500 hover:text-white rounded" @click="isActive = false">X</span>

            <x-jet-validation-errors class="mb-4" />
            <form 
              method="POST" 
              action="{{route('communaute.store')}}" 
              class="block max-w-md h-full mx-auto bg-white p-4 rounded-md overflow-y-auto" 
              enctype="multipart/form-data"
              @click.away="isActive = false"
            >
              @csrf
                <h1 class="text-center text-gray-800 font-bold mb-6 text-lg md:text-xl">Créer Page</h1>
                <article class="flex items-start rounded px-3 py-2 bg-blue-100 text-gray-900 mb-6">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1 flex-shrink-0"><path d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.514,2,12,2z M12,20c-4.411,0-8-3.589-8-8s3.589-8,8-8 s8,3.589,8,8S16.411,20,12,20z"></path><path d="M11 11H13V17H11zM11 7H13V9H11z"></path></svg>
                  <h3>Créer une Page pour partager des informations avec votre communaute.</h3>
                </article>
                  
                  <section class="sm:col-span-1 md:col-auto">
                      <!--Name page  field-->
                      <div class="col-span-1">
                        <x-jet-label for="name" value="{{ __('Nom de page') }}" />
                        <x-jet-input 
                          id="name" 
                          class="w-full" 
                          type="text" 
                          name="name" 
                          :value="old('name')" 
                          aria-placeholder="Entrer nom de page" 
                          required 
                          autofocus 
                          autocomplete="name"
                          x-ref="name" 
                          value=""
                        />
                      </div>
                  </section>
                  <section class="sm:col-span-1 md:col-auto">
                    

                      <div>

                        <!-- Descripton du don -->
                        <div class="mb-4">
                          <x-jet-label for="description" value="{{ __('Description Page') }}" />
                          <div 
                            class="rounded-md border-transparent mt-1 overflow-hidden"
                            :class="{ 'border border-red-400' : isFocused }"
                          >
                            <textarea
                              id="description"
                              name="description"
                              class="w-full block resize-none rounded-md shadow-none bg-gray-200 font-haireline text-sm px-3 py-2 outline-none focus:bg-white"
                              rows="6"
                              required
                              aria-placeholder="Entrer description"
                              @focusin="isFocused = true"
                              @focusout="isFocused = false"
                            ></textarea>
                          </div>
                        </div>

                        <!-- Upload image -->
                        <div class="mb-4">
                          <h3 class="text-gray-800 font-semibold mb-1">Ajouter l'image</h3>
                          <div 
                            x-data="{ hasImage: false }"
                            x-cloak
                            class="block w-full h-40 rounded grid place-items-center overflow-y-auto relative"
                            :class="{
                                      'border-dashed border-4 bg-gray-200' : !hasImage,
                                      'border-3 border-gray-300' : hasImage
                                    }"
                            id="preview__image"
                          >
                            <input 
                              type="file" 
                              accept="image/*"
                              class="hidden"
                              x-ref="fileInput"
                              id="image" 
                              name="image"
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
                      </div>
                      
                      <div>
                        <button 
                          type="submit" 
                          class="w-auto mx-auto flex items-center justify-center mt-5 bg-red-600 py-2 px-4 rounded-md text-sm text-white font-semibold hover:bg-red-700 focus:bg-red-700"
                        ><span>{{ __('Créer Page') }}</span></button>
                      </div>
                  </section>
            </form>
          </div>
        </div>
            <h1 class="text-sm text-red-700 font-semibold ml-1 sm:ml-0 sm:text-base lg:text-lg">
              @livewire('search-page')
            </h1>


           
        </section>

        <section class="max-w-screen-xl mx-auto grid grid-cols-1 gap-1 pt-6 pb-1 mt-2 sm:grid-cols-2 sm:gap-3 md:px-4 md:grid-cols-3 xl:grid-cols-4" :class="{ 'mt-20' : atTop }">

            @foreach($communautes as $communaute)
                <div class="bg-white p-2 rounded shadow hover:bg-gray-100 sm:p-3">
                    <a 
                        href="{{route('communaute.show', $communaute)}}"
                        class="w-full flex items-center sm:block"
                    >
                        <img 
                            src="{{asset('storage/'.$communaute->image)}}" 
                            aria-label="Image  de {{$communaute->name}}" 
                            class="w-10 h-10 mr-2 flex-shrink-0 rounded-full object-center object-cover sm:w-16 sm:h-16 sm:mx-auto sm:rounded-full sm:mb-2 md:w-20 md:h-20"
                        />
                        <div class="w-full text-gray-800 truncate sm:text-center">
                            <h3 class="text-sm font-bold lg:text-base truncate">{{$communaute->name}}</h3>
                            <h4 class="text-xs font-semibold lg:text-sm">Créée depuis le {{$communaute->start_at}}</h4>
                        </div>
                    </a>
                </div>
            @endforeach
        </section>
        <div>
            {{$communautes->links()}}
        </div>
    </section>


</div>


    <!-- SCRIPT -->
    <script type="text/javascript">
        function placeSubmenu() {
            return {
                atTop: false,
                setAtTop: function() {
                    // Pour les écrans >= 768 
                    if( window.outerWidth >= 768 && window.outerWidth < 1024 ) {
                        this.atTop = (window.pageYOffset > 80) ? true : false
                    }
                    // Pour les écrans < 768
                    if( window.outerWidth < 768 ) {
                        this.atTop = (window.pageYOffset > 60) ? true : false
                    }
                }
            }
        }

     $('#image').change(function(){            
      let reader = new FileReader();
      reader.onloadend = (e) => { 
        $('#preview-image').attr('src', e.target.result); 
      }
      reader.readAsDataURL(this.files[0]);
    });
    </script>
</x-app-layout>
