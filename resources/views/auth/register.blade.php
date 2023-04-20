<x-guest-layout>
    <x-slot name="title">Inscription réseau social Chretien</x-slot>

    <main class="w-full min-h-screen sm:grid sm:place-items-center bg-white relative px-3 pt-8 pb-4">

        <section class="w-full max-w-md">
            <section class="select-none text-center mb-4">
                <a href="{{ route('welcome') }}" class="text-lg text-red-700 leading-none font-bold">
                    <img src="{{asset('/images/logo.svg')}}" alt="logo affranchie" class="w-auto h-20 inline">
                </a>
            </section>

            <x-jet-authentication-card>
                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}" class="w-full pb-6">
                    @csrf

                    <h1 class="text-gray-900 font-extrabold text-base sm:text-lg text-center mb-8">Rejoindre la communauté Affranchie</h1>

                    <h3 class="flex items-start rounded px-3 py-2 bg-blue-100 text-gray-900 text-sm sm:text-base mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1 flex-shrink-0">
                            <path d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.514,2,12,2z M12,20c-4.411,0-8-3.589-8-8s3.589-8,8-8 s8,3.589,8,8S16.411,20,12,20z"></path><path d="M11 11H13V17H11zM11 7H13V9H11z"></path>
                        </svg>
                        <span>L'inscription est unique et gratuite pour l'éternité</span>
                    </h3>

                    <section class="grid grid-cols-2 sm:grid-cols-3 place-content-center gap-1 sm:gap-2 mb-4">
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
                            />
                        </div>
                        <!--FirstName field-->
                        <div class="col-span-1 sm:col-span-2">
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

                    <!--Sexe field-->
                    <section class="mb-2 sm:mb-4">
                        <h1 class="mb-1"><x-jet-label value="{{ __('Sexe') }}" /></h1>
                        <article class="flex items-center">
                            <div class="flex items-center mr-4">
                                <input 
                                    type="radio" 
                                    name="sexe" 
                                    id="male" 
                                    value="male"
                                    class="focus:outline-none mr-1" 
                                >
                                <x-jet-label for="male" value="{{ __('Homme') }}"/>
                            </div>
                            <div class="flex items-center">
                                <input 
                                    type="radio" 
                                    name="sexe" 
                                    id="female" 
                                    value="female"
                                    class="focus:outline-none mr-1" 
                                >
                                <x-jet-label for="female" value="{{ __('Femme') }}"/>
                            </div>
                        </article>
                    </section>

                    <!--Bithday field-->
                    <section class="mb-2 sm:mb-4">
                        <h1 class="mb-1"><x-jet-label value="{{ __('Date de Naissance') }}" /></h1>
                        <article class="flex items-center justify-between">
                            <div>
                             <x-jet-label for="day" value="{{ __('Jour') }}"/>
                                <article class="flex items-center">
                                    <select class="text-sm sm:text-base py-1" id="day" name="day" required>
                                       <option value="">Jour</option>
                                       @for($i=1; $i<= 31 ; $i++)
                                         <option value="{{$i}}">{{$i}}</option>
                                       @endfor
                                    </select>
                                </article>
                            </div>
                            <div>
                                <x-jet-label for="month" value="{{ __('Mois') }}"/>

                                <article class="flex items-center">
                                    <select class="text-sm sm:text-base py-1" id="month" name="month" size="" required>
                                       <option value="">Mois</option>
                                       <option value="Janvier">Janvier</option>
                                       <option value="Fevrier">Fevrier</option>
                                       <option value="Mars">Mars</option>
                                       <option value="Avril">Avril</option>
                                       <option value="Mai">Mai</option>
                                       <option value="Juin">Juin</option>
                                       <option value="Juillet">Juillet</option>
                                       <option value="Août">Août</option>
                                       <option value="Septembre">Septembre</option>
                                       <option value="Octobre">Octobre</option>
                                       <option value="Novembre">Novembre</option>
                                       <option value="Decembre">Decembre</option>
                                    </select>
                                </article>
                            </div>
                            <div>
                                <x-jet-label for="year" value="{{ __('Année') }}"/>
                                
                                 <article class="flex items-center">
                                    <select class="text-sm sm:text-base py-1" id="year" name="year" required>
                                       <option value="">Année</option>
                                       @for($i=2021; $i>=1921 ; $i--)
                                          <option value="{{$i}}">{{$i}}</option>
                                      @endfor
                                    </select>
                                </article>
                            </div>
                        </article>
                    </section>

                    <section class="mb-2 sm:mb-4 grid grid-cols-2 gap-1 sm:gap-2">
                        <!--mail field-->
                        <div>
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
                        <div>
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


                    <section class="mb-2 sm:mb-4 grid sm:grid-cols-2 gap-1 sm:gap-2">
                        <div>
                            <x-jet-label for="password" value="{{ __('Mot de passe') }}" />
                            <x-jet-input 
                                id="password" 
                                class="w-full" 
                                type="password" 
                                name="password" 
                                required 
                                autocomplete="new-password" 
                            />
                        </div>

                        <div>
                            <x-jet-label for="password_confirmation" value="{{ __('Confirmez votre mot de passe') }}" />
                            <x-jet-input 
                                id="password_confirmation" 
                                class="w-full" 
                                type="password" 
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password" 
                            />
                        </div>
                    </section>


                    <p class="flex items-start text-xs sm:text-sm">
                        <input  type="checkbox" class="form-checkbox mr-2" name="charte" required>
                        <span>En vous inscrivant sur Affranchie, vous vous engagez à respecter <a href="{{route('charte')}}" class="text-blue-700">les règles de la charte.</a></span>
                    </p>

                    <button 
                        type="submit" 
                        class="block w-full mx-auto mt-6 bg-red-600 p-2 rounded-md text-sm text-white font-semibold hover:bg-red-700 focus:bg-red-700"
                    >
                        {{ __('Je m\'inscris') }}
                    </button>

                    <p class="mt-2 text-xs sm:text-sm font-thin text-center">Déjà membre ? <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 focus:text-blue-700 focus:outline-none">Se connecter</a></p>
                </form>
            </x-jet-authentication-card>
        </section>

        <p class="w-full text-xs text-gray-500 text-center absolute bottom-0 left-0 py-2">&copy; {{date('Y')}} <img src="{{asset('/images/logo-texte.svg')}}" alt="logo affranchie" class="w-auto h-8 inline ml-2"></p>
    </main>


    <!-- SCRIPTS -->
    <!-- Suppression du footer -->
    <script type="text/javascript" src="{{asset('/assets/js/removeFooter.js')}}"></script>
</x-guest-layout>
