<x-guest-layout>
  <x-slot name="title">Dons</x-slot>

  <section class="w-full min-h-screen relative bg-white" id="dons">
    <div class="w-full pt-3 pl-3 lg:pt-5 lg:pl-20 absolute left-0 top-0 z-10">
      <a href="{{ route('dashboard') }}" alt="Logo affranchie" class="inline-block">
        <x-jet-application-mark />
      </a>
    </div>
    <!-- Banner -->
    <section 
      x-data="{}"
      x-cloak
      class="w-full bg-gray-300 relative page__banner"
      :class="{ '__xs' : window.innerWidth < 640 }"
    >
      <h1 class="w-full text-center font-black text-xl absolute transform -translate-y-1/2 -translate-x-1/2 text-white md:text-3xl banner__title">Faites une donation </h1>
      <div class="w-full max-w-md mx-auto bg-gray-800 p-2 rounded shadow-md absolute transform -translate-x-1/2 -translate-y-20 sm:-translate-y-full sm:bg-white sm:p-3">
        
      </div>
    </section>

    <section class="py-6 px-3 lg:pl-20 md:pr-0 md:grid md:grid-cols-2">
      
      <!-- Message -->
      <article class="col-span-1">
        <figure class="text-lg lg:text-xl text-gray-800 font-bold mb-6">
          <blockquote>
            <p><span class="leading-none text-2xl">&ldquo;</span>Allez, faites de toutes les nations des disciples, les baptisant au nom du Père, du Fils et du Saint-Esprit, et enseignez-leur à observer tout ce que je vous ai prescrit. Et voici, je suis avec vous tous les jours, jusqu'à la fin du monde.<span class="text-2xl leading-none">&rdquo;</span> <cite class="ml-2 text-sm font-semibold">Matthieu 28:19-20</cite></p>
          </blockquote>
        </figure>

        <p class="mb-4 font-light text-gray-600">
          Telle est l’une des recommandations du Seigneur Jésus. C’est d’ailleur cet ordre qui est à l’origine de la naissance de cette plateforme.
          <br/>
          C’est donc dire que notre objectif est non seulement <span class="font-bold">d'évangéliser</span> les non-croyants mais aussi et surtout <span class="font-bold">d'enseigner</span> en ligne toutes les âmes chrétiennes ou pas.
        </p>

        <p class="mb-4 font-light text-gray-600">
          Et c’est bien évidement avec vous, que nous voulons arriver à impacter toutes les régions du monde entier. Par conséquent, nous vous prions à nous accompagner dans cette mission que le Seigneur nous assigne par vos dons en nature et en finance.
          <br/>
         De cette manière, vous contribuez à l’évangélisation et à l’enseignement car tous vos dons permettront dans un premier temps aux différents départements de ladite plateforme de fonctionner et dans un second temps, d’aller en aide à toutes les personnes victimes de catastrophes naturelles et de toutes les crises sans distinction.
          <br/>
          Notre cible est, à l’exclusion de toute différence d’ordre raciale, réligieuse, ethnique, politique ou idéologique toute la communautés humaine.
        </p>

        <p class="font-light text-gray-600">Une pensée pieuse vers les personnes en détresse est salutaire.</p>

        <figure class="text-lg lg:text-xl text-gray-800 font-bold mt-6">
          <blockquote>
            <p><span class="leading-none text-2xl">&ldquo;</span>Que chacun donne comme il l’a résolu en son cœur, sans tristesse ni contrainte ; car Dieu aime celui qui donne avec joie.<span class="leading-none text-2xl">&rdquo;</span> <cite class="ml-2 text-sm font-semibold">2 Corinthiens 9:7</cite></p>
          </blockquote>
        </figure> 
      </article>

      
      <article class="col-span-1 flex items-center justify-center mt-10 md:mt-0">
        <!-- Liens de don -->
        <section
          x-data="{ isActive: false, isFocused: false }"
          x-cloak
        >
          <button 
            class="inline-flex items-baseline bg-blue-500 rounded py-2 px-2 lg:px-4 font-semibold text-xs lg:text-sm text-white mr-2 transform scale-100 transition duration-300 ease-out hover:bg-blue-600 hover:scale-110"
            @click="isActive = !isActive; $nextTick(() => {$refs.name.focus()});"
          >
            <svg class="w-4 h-4 lg:w-5 lg:h-5 mr-2 transform scale-125" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path></svg>
            <span>Don en nature</span>
          </button>

          <!-- Formulaire de don en nature -->
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
              action="{{route('don.store')}}" 
              class="block max-w-screen-md h-full mx-auto bg-white p-4 rounded-md overflow-y-auto" 
              enctype="multipart/form-data"
              @click.away="isActive = false"
            >
              @csrf
                <h1 class="text-center text-gray-800 font-bold mb-6 text-xl">Don en nature</h1>
                <article class="flex items-start rounded px-3 py-2 bg-blue-100 text-gray-900 mb-6">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1 flex-shrink-0"><path d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.514,2,12,2z M12,20c-4.411,0-8-3.589-8-8s3.589-8,8-8 s8,3.589,8,8S16.411,20,12,20z"></path><path d="M11 11H13V17H11zM11 7H13V9H11z"></path></svg>
                  <h3>Si vous avez des soucis à affectuer vos dons, Veuillez contacter le département social à l'adresse ci-dessous: <br> <span>social@affranchie.com</span></h3>
                </article>

                <div class="grid sm:grid-cols-2 gap-2 md:block pb-6 lg:pb-2">
                  
                  <!-- Informations donateur -->
                  <section class="sm:col-span-1 md:col-auto">
                    <h2 class="text-gray-800 font-semibold mb-5 underline">Informations du Donateur</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 place-content-start gap-2 mb-8">
                      <!--Name field-->
                      <div class="col-span-1">
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
                          x-ref="name" 
                        />
                      </div>
                      <!--FirstName field-->
                      <div class="col-span-1">
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
                      <!--mail field-->
                      <div class="col-span-2">
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
                      <div class="col-span-2">
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
                    </div>
                  </section>

                  <!-- Informations don -->
                  <section class="sm:col-span-1 md:col-auto">
                    <h2 class="text-gray-800 font-semibold mb-5 underline">Informations de la donation</h2>
                    <div class="grid md:grid-cols-2 gap-2">

                      <div>
                        <!-- Nom du don -->
                        <div class="mb-4">
                          <x-jet-label for="nom" value="{{ __('Nom Produits') }}" />
                          <x-jet-input 
                            id="nom" 
                            class="w-full" 
                            type="text" 
                            name="nom_produit" 
                            :value="old('nom_produit')" 
                            aria-placeholder="Entrez nom produit" 
                            required
                          />
                        </div>

                        <!-- Descripton du don -->
                        <div class="mb-4">
                          <x-jet-label for="description" value="{{ __('Description don') }}" />
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
                          <h3 class="text-gray-800 font-semibold mb-1">Ajouter une image</h3>
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
                              name="images"
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
                        <!-- Type du don -->
                        <div class="mb-4">
                          <h3 class="text-gray-800 text-sm font-bold mb-2">Type de don</h3>
                          <section 
                            x-data="{ isMaterial: false }"
                            x-cloak
                            class="grid grid-cols-2 gap-x-2"
                          >
                            <!-- Don en vivre -->
                            <div class="col-span-1 flex items-start">
                              <input 
                                type="radio" 
                                name="type" 
                                id="don_vivre"
                                class="mr-1"
                                @focusin="isMaterial = false" 
                              >
                              <x-jet-label class="leading-none" for="don_vivre" value="{{ __('Don en Vivre (Alimentaire) ') }}"/>
                            </div>

                            <!-- Don en non vivre -->
                            <div class="col-span-1 flex items-start">
                              <input 
                                type="radio" 
                                name="type" 
                                id="don_materiel"
                                class="mr-1"
                                @focusin="isMaterial = true"
                              >
                              <x-jet-label class="leading-none" for="don_materiel" value="{{ __('Don en non Vivre (Matériel)') }}"/>
                            </div>

                            <!-- Etape du don -->
                            <div class="col-span-2 mt-4" x-show="isMaterial" x-cloak>
                              <h4 class="text-gray-800 text-sm font-bold mb-2">Etat du don</h4>
                              <section class="grid grid-cols-2 gap-x-2">
                                <div class="col-span-1 flex items-start">
                                  <input 
                                    type="radio" 
                                    name="etat_don" 
                                    id="neuf" 
                                    value="neuf"
                                    class="focus:outline-none mr-1" 
                                  >
                                  <x-jet-label class="leading-none" for="neuf" value="{{ __('Neuf') }}"/>
                                </div>

                                <div class="col-span-1 flex items-start">
                                  <input 
                                    type="radio" 
                                    name="etat_don" 
                                    id="occassion" 
                                    value="occassion"
                                    class="focus:outline-none mr-1" 
                                  >
                                  <x-jet-label class="leading-none" for="occassion" value="{{ __('Occassion') }}"/>
                                </div>
                              </section>
                            </div>
                          </section>
                        </div>

                        <!-- Points relais -->
                        <div>
                          <x-jet-label class="mb-1" for="point_relais" value="{{ __('Choisir un point relais') }}" />
                          <select 
                            class="w-full border rounded p-1 text-sm" 
                            id="point_relais"
                            name="point_relais"
                            required
                          >
                            <option value="">Points relais...</option>
                            @foreach($villes as $ville)
                               <option value="{{$ville->name}}">{{$ville->name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <!-- Bouton d'envoi -->
                        <button 
                          type="submit" 
                          class="w-auto mx-auto flex items-center justify-center mt-20 bg-red-600 py-2 px-4 rounded-md text-sm text-white font-semibold hover:bg-red-700 focus:bg-red-700"
                        ><span>{{ __('Enregister don') }}</span></button>
                      </div>

                    </div>
                  </section>
                </div>
            </form>
          </div>
        </section>


        <!-- Don en Finance -->
        <section
           x-data="{ isActive: false }"
           x-cloak
        >
          <button 
            class="inline-flex items-baseline bg-yellow-500 rounded py-2 px-2 lg:px-4 font-semibold text-xs lg:text-sm text-white md:ml-2 transform scale-100 transition duration-200 ease-out hover:bg-yellow-600 hover:scale-110"
            @click="isActive = !isActive"
          >
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="hand-holding-usd" class="w-4 h-4 lg:w-5 lg:h-5 mr-2 transform scale-125" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M271.06,144.3l54.27,14.3a8.59,8.59,0,0,1,6.63,8.1c0,4.6-4.09,8.4-9.12,8.4h-35.6a30,30,0,0,1-11.19-2.2c-5.24-2.2-11.28-1.7-15.3,2l-19,17.5a11.68,11.68,0,0,0-2.25,2.66,11.42,11.42,0,0,0,3.88,15.74,83.77,83.77,0,0,0,34.51,11.5V240c0,8.8,7.83,16,17.37,16h17.37c9.55,0,17.38-7.2,17.38-16V222.4c32.93-3.6,57.84-31,53.5-63-3.15-23-22.46-41.3-46.56-47.7L282.68,97.4a8.59,8.59,0,0,1-6.63-8.1c0-4.6,4.09-8.4,9.12-8.4h35.6A30,30,0,0,1,332,83.1c5.23,2.2,11.28,1.7,15.3-2l19-17.5A11.31,11.31,0,0,0,368.47,61a11.43,11.43,0,0,0-3.84-15.78,83.82,83.82,0,0,0-34.52-11.5V16c0-8.8-7.82-16-17.37-16H295.37C285.82,0,278,7.2,278,16V33.6c-32.89,3.6-57.85,31-53.51,63C227.63,119.6,247,137.9,271.06,144.3ZM565.27,328.1c-11.8-10.7-30.2-10-42.6,0L430.27,402a63.64,63.64,0,0,1-40,14H272a16,16,0,0,1,0-32h78.29c15.9,0,30.71-10.9,33.25-26.6a31.2,31.2,0,0,0,.46-5.46A32,32,0,0,0,352,320H192a117.66,117.66,0,0,0-74.1,26.29L71.4,384H16A16,16,0,0,0,0,400v96a16,16,0,0,0,16,16H372.77a64,64,0,0,0,40-14L564,377a32,32,0,0,0,1.28-48.9Z"></path></svg>
            <span>Don en finance</span>
          </button>

          <!-- Formulaire de don en finance -->
          <div 
            class="py-8 px-3"
            :class="{
                      'w-screen h-screen fixed top-0 left-0 bg-black bg-opacity-25 z-50' : isActive,
                    }"
            x-show="isActive"
            x-cloak
          >

            <span class="p-2 text-gray-800 font-bold text-sm lg:text-base absolute top-0 right-0 transform translate-y-1 lg:translate-y-2 -translate-x-2 lg:-translate-x-6 cursor-pointer select-none bg-transparent hover:bg-red-500 hover:text-white rounded" @click="isActive = false">X</span>

            <article 
              class="max-w-screen-md mx-auto text-lg space-y-6 bg-white py-6 px-3 rounded-md"
              @click.away="isActive = false"
            >
              <h1 class="max-w-sm mx-auto text-center text-gray-800 font-bold mb-6 text-xl">Don en finance</h1>

              <article class="max-w-sm mx-auto flex items-start rounded px-3 py-2 bg-blue-100 text-gray-900 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1 flex-shrink-0"><path d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.514,2,12,2z M12,20c-4.411,0-8-3.589-8-8s3.589-8,8-8 s8,3.589,8,8S16.411,20,12,20z"></path><path d="M11 11H13V17H11zM11 7H13V9H11z"></path></svg>
                <h3 class="font-bold text-base">Pous tous vos dons financiers, veuillez les faire sur les numeros de comptes ci-dessous selon vos préférences.</h3>
              </article>

              <section>
                <h2 class="text-center text-lg font-semibold text-gray-900 mb-4">Comptes Mobile Money</h2>
                <article class="flex items-center justify-center flex-wrap space-x-4">
                  <div class="text-center">
                    <h3 class="text-sm font-semibold">Orange Money (OM)</h3>
                    <p class="font-bold">(+225) 07 7992 5594</p>
                  </div>
                  <div class="text-center">
                    <h3 class="text-sm font-semibold">MTN Mobile Money (MoMo)</h3>
                    <p class="font-bold">(+225) 05 5637 0887</p>
                  </div>
                  <div class="text-center">
                    <h3 class="text-sm font-semibold">Flooz (Moov Money)</h3>
                    <p class="font-bold">(+225) 01 5151 8236</p>
                  </div>
                </article>
              </section>

              <section>
                <h2 class="text-center text-lg font-semibold text-gray-900 mb-4">Compte bancaire</h2>
                <div class="flex items-center justify-center">
                  <a href="https://paypal.me/affranchie" target="_blank">
                    <img src="{{ asset('images/PayPal.svg') }}" title="Compte paypal Affranchie" alt="Lien vers le compte paypal de Affranchie" class="h-6 objectif-center">
                  </a>  
                </div>
              </section>
            </article>

          </div>
        </section>
      </article>
    </section>
       
  </section> 

  <footer class="py-2 px-3 md:pr-0 lg:pl-20 bg-gray-200">
    <div class="flex flex-col md:flex-row items-center justify-center text-sm md:justify-start">
      <div>
        <a href="" class="mx-1">Facebook</a> <a href="" class="mx-1">Twitter</a> <a href="" class="mx-1">Youtube</a>
      </div>
      <p class="md:ml-3">Affranchie &copy; 2021 - Tous droits réservés</p>
    </div>
  </footer>


  <script type="text/javascript">
    window.addEventListener("DOMContentLoaded", function() {
      let leftMenu = document.querySelector("#leftMenu"), header = document.querySelector("#main__header"), wrapper = document.querySelector("#wrapper"), footer = document.querySelector("#footer");
      if (leftMenu) {
        leftMenu.parentNode.removeChild(leftMenu);
      }
      if (header) {
        header.parentNode.removeChild(header);
      }
      if (footer) {
        footer.parentNode.removeChild(footer);
      }
      if (wrapper) {
        wrapper.style.paddingTop = "0";
      }
    });

    $('#image').change(function(){            
      let reader = new FileReader();
      reader.onloadend = (e) => { 
        $('#preview-image').attr('src', e.target.result); 
      }
      reader.readAsDataURL(this.files[0]);
    });
  </script>
      
</x-guest-layout>
