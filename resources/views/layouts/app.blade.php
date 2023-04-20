<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <title>{{page_title($title ?? '')}}</title>
        <link rel="icon" type="image/svg" href="{{asset('/images/logo-img.svg')}}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
           [x-cloak] { display: none; }
        </style>

        @livewireStyles

        <!-- Scripts  ok -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>

        <link href="{{asset('/assets/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('/assets/css/main.css')}}" rel="stylesheet" type="text/css">
        <script src="{{asset('/assets/jquery/jquery-3.5.1.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
        <script src="{{asset('/assets/jquery/jquery.timeago.js')}}"></script>
        <script src="{{asset('/assets/jquery/jquery.timeago.fr.js')}}"></script>
        <script src="{{asset('/assets/jquery/jquery.livequery.min.js')}}"></script>
   
    </head>
    <body 
        x-data="{ showSidemenu: false }"
        x-cloak
        class="font-sans antialiased"
    >
        <!-- HEADER -->
        @livewire('navigation-dropdown')
       
        <!-- WRAPPER -->
        <main class="w-full min-h-screen bg-gray-200 flex pb-8 sm:pb-0" id="wrapper">
            
            <!-- SideMenu -->
            <section 

                x-show="showSidemenu || window.outerWidth >= 1024" 
                x-cloak
                id="sideMenu"
                role="menu"
                class="bg-white left-0 fixed flex-shrink-0 lg:sticky z-20"
                :class="{ 'md__sideMenu' : window.outerWidth >= 1024 && 1280 > window.outerWidth }"
            >
                <div>

                    <ul class="w-full px-3 pt-6 space-y-1 font-medium text-gray-600 text-sm side__menu overflow-y-auto">
                        <li class="mb-6">
                            <a href="{{ route('profil.index',Auth::user())}}" class="flex items-center h-12 px-2 rounded-md hover:bg-gray-200 sideMenu__link {{set_active_route('profil.index')}}" title="{{ Auth::user()->name.' '.Auth::user()->firstname }}">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <img 
                                        class="w-8 h-8 rounded-full mr-2 object-center object-cover flex-shrink-0"
                                        src="{{ Auth::user()->profile_photo_url }}" 
                                        alt="{{ Auth::user()->name }}" 
                                    />
                                @else
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="w-8 h-8 rounded-full mr-2 flex-shrink-0">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                @endif
                                <p class="w-full truncate">{{ Auth::user()->name.' '.Auth::user()->firstname }}</p>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('forum.index')}}" class="flex items-center h-12 px-2 rounded-md hover:bg-gray-200 sideMenu__link {{set_active_route('forum.index')}}">
                                <svg class="w-5 h-5 mr-2" aria-hidden="true" focusable="false" role="img" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4,18h1h1v4.081L11.101,18H12h4c1.103,0,2-0.897,2-2V8c0-1.103-0.897-2-2-2H4C2.897,6,2,6.897,2,8v8 C2,17.103,2.897,18,4,18z"></path><path d="M20,2h-1h-2.002H9H8C6.897,2,6,2.897,6,4h3h7.586H18c1.103,0,2,0.897,2,2v1.414V11v3c1.103,0,2-0.897,2-2v-1V7V5V4 C22,2.897,21.103,2,20,2z"></path>
                                </svg>
                                <span>Forum</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('don.index') }}" class="flex items-center h-12 px-2 rounded-md hover:bg-gray-200 sideMenu__link {{set_active_route('don.index')}}">
                                <svg class="w-5 h-5 mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="hand-holding-heart"  role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M275.3 250.5c7 7.4 18.4 7.4 25.5 0l108.9-114.2c31.6-33.2 29.8-88.2-5.6-118.8-30.8-26.7-76.7-21.9-104.9 7.7L288 36.9l-11.1-11.6C248.7-4.4 202.8-9.2 172 17.5c-35.3 30.6-37.2 85.6-5.6 118.8l108.9 114.2zm290 77.6c-11.8-10.7-30.2-10-42.6 0L430.3 402c-11.3 9.1-25.4 14-40 14H272c-8.8 0-16-7.2-16-16s7.2-16 16-16h78.3c15.9 0 30.7-10.9 33.3-26.6 3.3-20-12.1-37.4-31.6-37.4H192c-27 0-53.1 9.3-74.1 26.3L71.4 384H16c-8.8 0-16 7.2-16 16v96c0 8.8 7.2 16 16 16h356.8c14.5 0 28.6-4.9 40-14L564 377c15.2-12.1 16.4-35.3 1.3-48.9z"></path></svg>
                                <span>Faire un don</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('intercession.index')}}" class="flex items-center h-12 px-2 rounded-md hover:bg-gray-200 sideMenu__link {{set_active_route('intercession.index')}}">
                                <svg class="w-5 h-5 mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="hands" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M204.8 230.4c-10.6-14.1-30.7-17-44.8-6.4-14.1 10.6-17 30.7-6.4 44.8l38.1 50.8c4.8 6.4 4.1 15.3-1.5 20.9l-12.8 12.8c-6.7 6.7-17.6 6.2-23.6-1.1L64 244.4V96c0-17.7-14.3-32-32-32S0 78.3 0 96v218.4c0 10.9 3.7 21.5 10.5 30l104.1 134.3c5 6.5 8.4 13.9 10.4 21.7 1.8 6.9 8.1 11.6 15.3 11.6H272c8.8 0 16-7.2 16-16V384c0-27.7-9-54.6-25.6-76.8l-57.6-76.8zM608 64c-17.7 0-32 14.3-32 32v148.4l-89.8 107.8c-6 7.2-17 7.7-23.6 1.1l-12.8-12.8c-5.6-5.6-6.3-14.5-1.5-20.9l38.1-50.8c10.6-14.1 7.7-34.2-6.4-44.8-14.1-10.6-34.2-7.7-44.8 6.4l-57.6 76.8C361 329.4 352 356.3 352 384v112c0 8.8 7.2 16 16 16h131.7c7.1 0 13.5-4.7 15.3-11.6 2-7.8 5.4-15.2 10.4-21.7l104.1-134.3c6.8-8.5 10.5-19.1 10.5-30V96c0-17.7-14.3-32-32-32z"></path></svg>
                                <span>Sujets d'intercession</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('verset.index')}}" class="flex items-center h-12 px-2 rounded-md hover:bg-gray-200 sideMenu__link {{set_active_route('verset.index')}}">
                                <svg class="w-5 h-5 mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bible" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M448 358.4V25.6c0-16-9.6-25.6-25.6-25.6H96C41.6 0 0 41.6 0 96v320c0 54.4 41.6 96 96 96h326.4c12.8 0 25.6-9.6 25.6-25.6v-16c0-6.4-3.2-12.8-9.6-19.2-3.2-16-3.2-60.8 0-73.6 6.4-3.2 9.6-9.6 9.6-19.2zM144 144c0-8.84 7.16-16 16-16h48V80c0-8.84 7.16-16 16-16h32c8.84 0 16 7.16 16 16v48h48c8.84 0 16 7.16 16 16v32c0 8.84-7.16 16-16 16h-48v112c0 8.84-7.16 16-16 16h-32c-8.84 0-16-7.16-16-16V192h-48c-8.84 0-16-7.16-16-16v-32zm236.8 304H96c-19.2 0-32-12.8-32-32s16-32 32-32h284.8v64z"></path></svg>
                                <span>Verset du jour</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('web.tv')}}" class="flex items-center h-12 px-2 rounded-md hover:bg-gray-200 sideMenu__link {{set_active_route('web.tv')}}">
                                <svg class="w-5 h-5 mr-2" aria-hidden="true" focusable="false" fill="currentColor" height="50px" id="Layer_1" version="1.1" viewBox="0 0 50 50" width="50px" role="img" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><rect fill="none" height="50" width="50"/><rect fill="none" height="30" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" width="48" x="1" y="8"/><line fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" x1="39" x2="11" y1="42" y2="42"/><path d="M31.977,23.049l-11.021-6.363c-0.197-0.113-0.441-0.113-0.637,0C20.121,16.799,20,17.009,20,17.236v12.729  c0,0.228,0.121,0.438,0.318,0.551c0.098,0.057,0.208,0.085,0.318,0.085c0.109,0,0.22-0.028,0.318-0.085l11.021-6.363  c0.197-0.114,0.318-0.324,0.318-0.552S32.174,23.163,31.977,23.049z"/></svg>
                                <span>Web TV</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('membres.index')}}" class="flex items-center h-12 px-2 rounded-md hover:bg-gray-200 sideMenu__link {{set_active_route('membres.index')}}">
                                <svg class="w-5 h-5 mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="users" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path></svg>
                                <span>Membres</span>
                            </a>
                        </li>
                             <!-- new feature-->
                         <li>
                            <a href="{{route('communaute.index')}}" class="flex items-center h-12 px-2 rounded-md hover:bg-gray-200 sideMenu__link {{set_active_route('communaute.index')}}">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                <span>Pages</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('contacts.index')}}" class="flex items-center h-12 px-2 rounded-md hover:bg-gray-200 sideMenu__link {{set_active_route('contacts.index')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" aria-hidden="true" focusable="false" role="img" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M20,4H6C4.897,4,4,4.897,4,6v5h2V8l6.4,4.8c0.178,0.133,0.389,0.2,0.6,0.2s0.422-0.067,0.6-0.2L20,8v9h-8v2h8 c1.103,0,2-0.897,2-2V6C22,4.897,21.103,4,20,4z M13,10.75L6.666,6h12.668L13,10.75z"></path><path d="M2 12H9V14H2zM4 15H10V17H4zM7 18H11V20H7z"></path></svg>
                                <span>Nous contacter</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('about')}}" class="flex items-center h-12 px-2 rounded-md hover:bg-gray-200 sideMenu__link {{set_active_route('about')}}">
                                <svg class="w-5 h-5 mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"></path></svg>
                                <span>A propos</span>
                            </a>
                        </li>
                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                        @endif
                    </ul>
                    
                    <footer class="w-full absolute bottom-0 left-0 p-2 text-sm text-gray-600 bg-gray-100 xl:bg-white">
                        <a href="{{route('reglement')}}" class="hover:underline">La charte</a>
                       <!--<a href="" class="hover:underline">Facebook</a>
                        <a href="" class="hover:underline">Twitter</a>
                        <a href="" class="hover:underline">Instagram</a>
                        <a href="" class="hover:underline">Youtube</a> -->
                        <p class="inline"><img src="{{asset('/images/logo-texte.svg')}}" alt="logo affranchie" class="w-auto h-6 inline mx-2"> &COPY;2021 - Tous droits réservés</p>
                    </footer>
                </div>
            </section>

            <!-- Main Bloc Page -->
            <section class="w-full text-gray-700">
                
                <!-- Alert Messages -->
                @if(session('success'))
                    <script type="text/javascript">
                        swal("Félicitations!","{!! session('success') !!}","success",{
                            button:"OK"
                        })
                    </script>
                 @endif

                 @if(session('danger'))
                    <script type="text/javascript">
                        swal("Approbation!","{!! session('success') !!}","danger",{
                            button : "ok"
                        })
                    </script>
                @endif
                <!-- End Alert Messages -->

                <!-- Post Displaying Start Here -->
                {{ $slot }}
                <!-- Post Displaying End Here -->
            </section>

        </main>


        @stack('modals')

       

        <!-- SCRIPTS -->
        <script type="text/javascript">
            window.onload = function() { 

                const postTextsarray = Object.values(document.querySelectorAll(".postTextContent"));

                postTextsarray.forEach(postText => {
                    let initialText =  postText.innerHTML;
                    let textWordsArray = initialText.split(' ');

                    if( textWordsArray.length > 100 ) {
                        const wordsToDisplay = [];
                        var startIndex = 0, endIndex = 50;

                        // Créer le bouton "Lire la suite"
                        var readMore = document.createElement("span");
                        readMore.textContent = "...Lire la suite";
                        readMore.classList.add("ml-2", "text-gray-800", "font-semibold", "text-xs", "hover:underline", "sm:text-base", "cursor-pointer");

                        for (var l = startIndex; l < endIndex; l++) {
                            if(textWordsArray[l].match(/[a-z]/i)) {
                                wordsToDisplay.push(textWordsArray[l]);
                            } else {
                                wordsToDisplay.push(textWordsArray[l]);
                                ++endIndex;
                            }
                        }

                        postText.innerHTML = wordsToDisplay.join(' ');
                        postText.appendChild(readMore);
                    }
                    else {
                        return false;
                    }

                    readMore.addEventListener("click", function() {
                        postText.innerHTML = initialText;
                    }, false);
                });
            };
        </script>
        
  @livewireScripts
 </body>
</html>
