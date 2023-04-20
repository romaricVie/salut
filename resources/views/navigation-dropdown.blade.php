<header
    class="w-full h-12 pt-2 sticky top-0 bg-white z-30 sm:pt-0 md:h-16 px-3 md:px-6 xl:px-10 shadow sm:shadow-sm"
    id="main__header"
>

    <nav class="h-full flex items-center">
        <div class="w-full flex items-center justify-between">
            <!-- Logo et barre de recherche -->
            <div class="w-full sm:w-auto flex items-center justify-between">
                <a href="{{ route('dashboard') }}" class="text-lg text-red-700 font-bold">
                       <x-jet-application-mark/></a>

                <!-- Search & Notifs -->
                <div class="space-x-2 flex items-center">
                    <!-- SEARCH -->
                    @livewire('search-member')

                    <!-- Notfications -->
                    <div
                        x-data="{ isOpen: false }"
                        x-cloak
                        class="sm:hidden"
                    >
                        <button
                            class="w-8 h-8 grid place-items-center text-gray-600 focus:outline-none relative"
                            :class="{ 'text-red-600' : isOpen }"
                            @click="isOpen = !isOpen"
                        >
                            <svg class="w-6 h-6 transform rotate-12" aria-hidden="true" focusable="false" role="img" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path></svg>
                            @if (auth()->user()->unreadNotifications->count() >0)
                                <span class="inline-block w-6 h-6 border border-white grid place-items-center absolute top-0 right-0 bg-blue-500 text-white text-xs text-center leading-none font-medium rounded-full transform translate-x-3 -translate-y-2">{{auth()->user()->unreadNotifications->count()}}</span>
                            @endif
                        </button>
                        <section
                            x-show="isOpen"
                            x-cloak
                            class="absolute left-0 top-0 w-screen bg-white border-t rounded-md shadow transform translate-y-12"
                            @click.away="isOpen = false"
                        >
                            <h1 class="text-base font-bold text-gray-900 my-2 px-2">Notifications</h1>
                            <ul 
                                class="overflow-y-auto p-2 space-y-1 xs__dropdown"
                                @click="isOpen = false"
                            > 
                                @foreach(auth()->user()->unreadNotifications as $notification)
                                    <li class="mb-1 border-y border-gray-200">
                                        <a href="{{route('show.notification',['topic'=>$notification->data['topic_id'], 'notification' => $notification->id])}}" class="w-full block rounded p-2 text-sm text-gray-600 hover:bg-gray-200" >
                                            
                                        {{$notification->data['name']}} a posté un commentaire sur {{$notification->data['topic_title']}}
                                      </a>
                                    </li>
                                @endforeach
                            </ul>
                        </section>
                    </div>
                </div>
            </div>

            <!-- Menu principal -->
            <div class="fixed bottom-0 left-0 w-full bg-white sm:bg-transparent px-3 py-2 z-40 sm:z-auto border-t sm:border-none sm:z-auto sm:relative sm:w-auto flex items-center justify-between text-gray-500 space-x-2 lg:transform lg:-translate-x-4">
                <!-- Accueil -->
                <a 
                    href="{{ route('dashboard') }}" 
                    aria-label="Accueil"
                    data-title="Accueil"
                    class="sm:w-10 sm:h-10 md:w-12 md:h-12 p-1 grid place-items-center md:rounded lg:w-16 {{set_active_route('dashboard')}}"
                    :class="{ 'hover:bg-red-200 hover:text-red-600 main__link' : (window.innerWidth >= 768)}"
                >
                    <svg class="w-6 h-6 md:w-8 md:h-8" fill="currentColor" baseProfile="tiny" height="24px" id="Layer_1" version="1.2" viewBox="0 0 24 24" width="24px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path d="M12,3c0,0-6.186,5.34-9.643,8.232C2.154,11.416,2,11.684,2,12c0,0.553,0.447,1,1,1h2v7c0,0.553,0.447,1,1,1h3  c0.553,0,1-0.448,1-1v-4h4v4c0,0.552,0.447,1,1,1h3c0.553,0,1-0.447,1-1v-7h2c0.553,0,1-0.447,1-1c0-0.316-0.154-0.584-0.383-0.768  C18.184,8.34,12,3,12,3z"/>
                    </svg>
                </a>

                <!-- Témoignages -->
                <a 
                    href="{{ route('temoignage.index') }}" 
                    aria-label="Témognages"
                    data-title="Témoignages"
                    class="sm:w-10 sm:h-10 md:w-12 md:h-12 p-1 grid place-items-center md:rounded lg:w-16 {{set_active_route('temoignage.index')}}"
                    :class="{ 'hover:bg-red-200 hover:text-red-600 main__link' : (window.innerWidth >= 768)}"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 md:w-8 md:h-8" aria-hidden="true" focusable="false" role="img" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M20.664 3.478L8 8v7l.748.267-1.127 2.254c-.26.519-.281 1.123-.06 1.659.223.536.665.949 1.216 1.133l4.084 1.361c.205.068.416.101.624.101.741 0 1.451-.414 1.797-1.104l1.303-2.606 4.079 1.457c.65.233 1.336-.25 1.336-.941V4.419C22 3.728 21.314 3.245 20.664 3.478zM13.493 19.777L9.41 18.416l1.235-2.471 4.042 1.444L13.493 19.777zM4 15h2V8H4c-1.103 0-2 .897-2 2v3C2 14.103 2.897 15 4 15z"></path>
                    </svg>
                </a>

                <!-- Créer -->
                <div
                    x-data="{ isOpen: false, isActive: false, activeForm: '' }"
                    x-cloak
                    class="relative sm:hidden"
                >
                    <button
                        class="w-8 h-8 grid place-items-center text-gray-600 focus:outline-none"
                        :class="{ 'text-red-600' : isOpen }"
                        @click="isOpen = !isOpen"
                    >
                        <svg class="w-8 h-8" aria-hidden="true" focusable="false" role="img" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    </button>
                    <section
                        x-show="isOpen"
                        x-cloak
                        class="fixed left-0 bottom-0 w-screen bg-white border-t rounded-md shadow transform -translate-y-12 z-50"
                        @click.away="isOpen = false"
                    >
                        <h1 class="text-base font-bold text-gray-900 my-2 px-2">Créer</h1>
                        <ul 
                            class="overflow-y-auto p-2 space-y-1 xs__dropdown"
                            @click="isOpen = false"
                        >
                            <li>
                                <a 
                                    href="#publication_form" 
                                    class="w-full block rounded p-2 flex items-start hover:bg-gray-200"
                                    @click.prevent="isActive = !isActive; $nextTick(() => { activeForm = 'publication_form' });"
                                >
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path transform="rotate(45.001 19.345 4.656)" d="M17.223 3.039H21.466V6.273H17.223z"></path><path d="M8 16L11 16 18.287 8.713 15.287 5.713 8 13z"></path><path d="M19,19H8.158c-0.026,0-0.053,0.01-0.079,0.01c-0.033,0-0.066-0.009-0.1-0.01H5V5h6.847l2-2H5C3.897,3,3,3.896,3,5v14 c0,1.104,0.897,2,2,2h14c1.104,0,2-0.896,2-2v-8.668l-2,2V19z"></path></svg>
                                    </span>
                                    <div>
                                        <p class="text-sm text-gray-900 font-bold">Publication</p>
                                        <p class="text-xs">Partagez une publication sur le fil d'actualité</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a 
                                    href="#temoignage_form" 
                                    class="w-full block rounded p-2 flex items-start hover:bg-gray-200"
                                    @click.prevent="isActive = !isActive; $nextTick(() => { activeForm = 'temoignage_form' });"
                                >
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" aria-hidden="true" focusable="false" role="img" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M20.664 3.478L8 8v7l.748.267-1.127 2.254c-.26.519-.281 1.123-.06 1.659.223.536.665.949 1.216 1.133l4.084 1.361c.205.068.416.101.624.101.741 0 1.451-.414 1.797-1.104l1.303-2.606 4.079 1.457c.65.233 1.336-.25 1.336-.941V4.419C22 3.728 21.314 3.245 20.664 3.478zM13.493 19.777L9.41 18.416l1.235-2.471 4.042 1.444L13.493 19.777zM4 15h2V8H4c-1.103 0-2 .897-2 2v3C2 14.103 2.897 15 4 15z"></path></svg>
                                    </span>
                                    <div>
                                        <p class="text-sm text-gray-900 font-bold">Témoignage</p>
                                        <p class="text-xs">Partagez votre témoignage pour édifier quelqu'un qui traverse votre situation</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a 
                                    href="#temoignage_form" 
                                    class="w-full block rounded p-2 flex items-start hover:bg-gray-200"
                                    @click.prevent="isActive = !isActive; $nextTick(() => { activeForm = 'enseignement_form' });"
                                >
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                    </span>
                                    <div>
                                        <p class="text-sm text-gray-900 font-bold">Enseignement</p>
                                        <p class="text-xs">Partagez un enseignement pour éclairer des personnes</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a 
                                    href="#evenement_form" 
                                    class="w-full block rounded p-2 flex items-start hover:bg-gray-200"
                                    @click.prevent="isActive = !isActive; $nextTick(() => { activeForm = 'evenement_form' });"
                                >
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg class="w-4 h-4" aria-hidden="true" focusable="false" data-prefix="far" data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path></svg>
                                    </span>
                                    <div>
                                        <p class="text-sm text-gray-900 font-bold">Évènement</p>
                                        <p class="text-xs">Partagez votre évènement pour  attirer plus de personne</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </section>

                    <!-- Section de création de contenu -->
                    <section
                        x-show="isActive"
                        x-cloak
                        class="w-screen h-screen bg-black bg-opacity-25 fixed left-0 top-0 z-50 grid place-items-center py-6 px-4"
                        id="creer_forms"
                    >
                        <button 
                            class="absolute top-0 right-0 transform -translate-x-1 translate-y-2 text-gray-700 bg-white w-6 h-6 grid place-items-center rounded-full z-50 p-1 focus:outline-none"
                            @click="isActive = false"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>

                        <!-- Publication -->
                        <section
                            x-show="activeForm === 'publication_form'"
                            x-cloak
                            @click.away="isActive = false"
                            id="publication_form"
                            class="bg-white w-full max-w-lg p-3 shadow-md rounded-md"
                        >
                            <form 
                                x-data="{ isFocused: false, text: '' }"
                                x-cloak
                                method="POST" 
                                action="{{route('post.store')}}" 
                                class="w-full" 
                                enctype="multipart/form-data"

                            >
                                @csrf

                                
                                <section 
                                  class=" px-2 py-3"
                                  :class="{'bg-white' : isFocused || text !== ''}" 
                                >
                                    <textarea 
                                        id="message"
                                        name="message" 
                                        rows="10"
                                        placeholder="Dites quelque chose à la communauté !"
                                        class="w-full block resize-none px-1 outline-none bg-transparent text-gray-700"
                                        @focusin="isFocused = true"
                                        @focusout="isFocused = false"
                                        x-model="text"
                                    >{{old('message')?? old('message')}}</textarea>

                                    <!-- Preview -->
                                    <div class="mb-4">
                                      <h3 class="text-gray-800 font-semibold mb-1">Ajouter une image</h3>
                                      <div 
                                        x-data="{ hasImage: false }"
                                        x-cloak
                                        class="block w-full h-40 rounded grid place-items-center overflow-y-auto relative"
                                        :class="{
                                                  'border-dashed border-4 bg-gray-200' : !hasImage,
                                                  'border-2 border-gray-300' : hasImage,
                                                }"
                                    >
                                        <input 
                                          type="file" 
                                          class="hidden select_img"
                                          x-ref="fileInput"
                                          id="image_post" 
                                          name="image"
                                          accept="image/*" 
                                          @change="hasImage = ($event.target.files.length > 0) ? true : false"
                                        >

                                        <img src="" alt="" class="max-w-full h-auto hidden preview">
                                        
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
                                </section>

                                <button 
                                    type="submit" 
                                    class="w-full text-center bg-red-600 py-2 px-5 rounded text-xs text-white font-semibold hover:bg-red-700 focus:bg-red-700"
                                >Publier</button>
                            </form>

                            <script type="text/javascript">
                                
                            </script>
                        </section>

                        <!-- Témoignages -->
                        <section
                            x-show="activeForm === 'temoignage_form'"
                            x-cloak
                            @click.away="isActive = false"
                            id="temoignage_form"
                            class="bg-white w-full max-w-lg p-3 shadow-md rounded-md"
                        >
                            <form 
                                x-data="{ isFocused: false, text: '' }"
                                x-cloak
                                method="POST" 
                                action="{{route('temoignage.store')}}" 
                                class="w-full" 
                                enctype="multipart/form-data"

                            >
                                @csrf

                                
                                <section 
                                  class=" px-2 py-3"
                                  :class="{'bg-white' : isFocused || text !== ''}" 
                                >
                                    <textarea 
                                        id="message"
                                        name="message" 
                                        rows="10"
                                        placeholder="Dites quelque chose à la communauté !"
                                        class="w-full block resize-none px-1 outline-none bg-transparent text-gray-700"
                                        @focusin="isFocused = true"
                                        @focusout="isFocused = false"
                                        x-model="text"
                                    >{{old('message')?? old('message')}}</textarea>

                                    <!-- Preview -->
                                    <div class="mb-4">
                                      <h3 class="text-gray-800 font-semibold mb-1">Ajouter une image</h3>
                                      <div 
                                        x-data="{ hasImage: false }"
                                        x-cloak
                                        class="block w-full h-40 rounded grid place-items-center overflow-y-auto relative"
                                        :class="{
                                                  'border-dashed border-4 bg-gray-200' : !hasImage,
                                                  'border-2 border-gray-300' : hasImage,
                                                }"
                                    >
                                        <input 
                                          type="file" 
                                          class="hidden select_img"
                                          x-ref="fileInput"
                                          id="image_temoignage" 
                                          name="image"
                                          accept="image/*" 
                                          @change="hasImage = ($event.target.files.length > 0)? true : false"
                                        >

                                        <img src="" alt="" class="max-w-full h-auto hidden preview">

                                        <button
                                        class="text-gray-600 transition duration-100 ease-in focus:border-solid focus:border"
                                          :class="{ 'bg-white p-2 rounded-md hover:bg-gray-300' : !hasImage,
                                                    'bg-gray-200 px-2 py-1 hover:bg-gray-300 rounded absolute top-0 right-0 transform translate-y-1 -translate-x-1 leading-none' : hasImage,
                                                  }"
                                          x-on:click.prevent="$refs.fileInput.click()"
                                        >
                                          <span x-show="hasImage"  x-cloak class="text-xs font-semibold">changer l'image</span>
                                          <svg x-show="!hasImage" x-cloak class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </button>
                                      </div>
                                   </div>
                                </section>

                                <button 
                                    type="submit" 
                                    class="w-full text-center bg-red-600 py-2 px-5 rounded text-xs text-white font-semibold hover:bg-red-700 focus:bg-red-700"
                                >Partager témoignage</button>
                            </form>
                        </section>

                        <!-- Enseignements -->
                        <section
                            x-show="activeForm === 'enseignement_form'"
                            x-cloak
                            @click.away="isActive = false"
                            id="enseignement_form"
                            class="bg-white w-full max-w-lg p-3 shadow-md rounded-md"
                        >
                            <form 
                                x-data="{ isFocused: false, text: '' }"
                                x-cloak
                                method="POST" 
                                action="{{route('enseignement.store')}}" 
                                class="w-full" 
                                enctype="multipart/form-data"

                            >
                                @csrf

                                
                                <section 
                                  class=" px-2 py-3"
                                  :class="{'bg-white' : isFocused || text !== ''}" 
                                >
                                    <textarea 
                                        id="message"
                                        name="message" 
                                        rows="10"
                                        placeholder="Dites quelque chose à la communauté !"
                                        class="w-full block resize-none px-1 outline-none bg-transparent text-gray-700"
                                        @focusin="isFocused = true"
                                        @focusout="isFocused = false"
                                        x-model="text"
                                    >{{old('message')?? old('message')}}</textarea>

                                    <!-- Preview -->
                                    <div class="mb-4">
                                      <h3 class="text-gray-800 font-semibold mb-1">Ajouter une image</h3>
                                      <div 
                                        x-data="{ hasImage: false }"
                                        x-cloak
                                        class="block w-full h-40 rounded grid place-items-center overflow-y-auto relative"
                                        :class="{
                                                  'border-dashed border-4 bg-gray-200' : !hasImage,
                                                  'border-2 border-gray-300' : hasImage,
                                                }"
                                    >
                                        <input 
                                          type="file" 
                                          class="hidden select_img"
                                          x-ref="fileInput"
                                          id="image_enseignement" 
                                          name="image"
                                          accept="image/*" 
                                          @change="hasImage = ($event.target.files.length > 0)? true : false"
                                        >

                                        <img src="" alt="" class="max-w-full h-auto hidden preview">
                                       
                                        <button
                                        class="text-gray-600 transition duration-100 ease-in focus:border-solid focus:border"
                                          :class="{ 'bg-white p-2 rounded-md hover:bg-gray-300' : !hasImage,
                                                    'bg-gray-200 px-2 py-1 hover:bg-gray-300 rounded absolute top-0 right-0 transform translate-y-1 -translate-x-1 leading-none' : hasImage,
                                                  }"
                                          x-on:click.prevent="$refs.fileInput.click()"
                                        >
                                          <span x-show="hasImage"  x-cloak class="text-xs font-semibold">changer l'image</span>
                                          <svg x-show="!hasImage" x-cloak class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </button>
                                      </div>
                                   </div>
                                </section>

                                <button 
                                    type="submit" 
                                    class="w-full text-center bg-red-600 py-2 px-5 rounded text-xs text-white font-semibold hover:bg-red-700 focus:bg-red-700"
                                >Partager enseignement</button>
                            </form>
                        </section>

                        <!-- Evènements -->
                        <section
                            x-show="activeForm === 'evenement_form'"
                            x-cloak
                            @click.away="isActive = false"
                            id="evenement_form"
                            class="bg-white w-full max-w-lg p-3 shadow-md rounded-md"
                        >
                            <form 
                                x-data="{ isFocused: false, text: '' }"
                                x-cloak
                                method="POST" 
                                action="{{route('evenement.store')}}" 
                                class="w-full" 
                                enctype="multipart/form-data"

                            >
                                @csrf

                                
                                <section 
                                  class=" px-2 py-3"
                                  :class="{'bg-white' : isFocused || text !== ''}" 
                                >
                                    <textarea 
                                        id="message"
                                        name="message" 
                                        rows="10"
                                        placeholder="Dites quelque chose à la communauté !"
                                        class="w-full block resize-none px-1 outline-none bg-transparent text-gray-700"
                                        @focusin="isFocused = true"
                                        @focusout="isFocused = false"
                                        x-model="text"
                                    >{{old('message')?? old('message')}}</textarea>

                                    <!-- Preview -->
                                    <div class="mb-4">
                                     <h3 class="text-gray-800 font-semibold mb-1">Ajouter une image</h3>
                                     <div 
                                        x-data="{ hasImage: false }"
                                        x-cloak
                                        class="block w-full h-40 rounded grid place-items-center overflow-y-auto relative"
                                        :class="{
                                                  'border-dashed border-4 bg-gray-200' : !hasImage,
                                                  'border-2 border-gray-300' : hasImage,
                                                }"
                                    >
                                        <input 
                                          type="file" 
                                          class="hidden select_img"
                                          x-ref="fileInput"
                                          id="image_evenement" 
                                          name="image"
                                          accept="image/*" 
                                          @change="hasImage = ($event.target.files.length > 0)? true : false"
                                        >

                                        <img src="" alt="" class="max-w-full h-auto hidden preview">

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
                                </section>

                                <button 
                                    type="submit" 
                                    class="w-full text-center bg-red-600 py-2 px-5 rounded text-xs text-white font-semibold hover:bg-red-700 focus:bg-red-700"
                                >Partager évènement</button>
                            </form>
                        </section>
                    </section>
                </div>

                <!--  Enseignement  -->
                <a 
                    href="{{route('enseignement.index')}}" 
                    aria-label="Enseignements"
                    data-title="Enseignements"
                    class="sm:w-10 sm:h-10 md:w-12 md:h-12 p-1 grid place-items-center md:rounded lg:w-16 {{set_active_route('enseignement.index')}}"
                    :class="{ 'hover:bg-red-200 hover:text-red-600 main__link' : (window.innerWidth >= 768)}"
                >
                    <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </a>

                <!-- Evènements -->
                <a 
                    href="{{ route('evenement.index') }}" 
                    aria-label="Évènements"
                    data-title="Évènements"
                    class="sm:w-10 sm:h-10 md:w-12 md:h-12 p-1 grid place-items-center md:rounded lg:w-16 {{set_active_route('evenement.index')}}"
                    :class="{ 'hover:bg-red-200 hover:text-red-600 main__link' : (window.innerWidth >= 768)}"
                >
                    <svg class="w-5 h-5 md:w-6 md:h-6" aria-hidden="true" focusable="false" data-prefix="far" data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path>
                    </svg>
                </a>    

                <!-- Mon compte -->
                <div
                    x-data="{ isOpen: false }"
                    x-cloak
                    class="relative sm:hidden"
                >
                    <button
                        @click="isOpen = !isOpen"
                        class="w-8 h-8 grid place-items-center rounded-full border bg-gray-200 overflow-hidden"
                    >
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <img class="h-full w-full rounded-full object-cover overflow-hidden object-center" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        @else
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        @endif
                    </button>
                    <section
                        x-show="isOpen"
                        x-cloak
                        class="fixed left-0 bottom-0 w-screen bg-white border-t rounded-md shadow transform -translate-y-12 z-50"
                        @click.away="isOpen = false"
                    >
                        <h1 class="text-base font-bold text-gray-900 my-2 px-2">Mon Compte</h1>
                        <ul class="h-full overflow-y-auto p-2 space-y-1 xs__dropdown">
                            <li class="mb-1">
                                <a href="{{ route('profil.index',Auth::user())}}" class="w-full block rounded p-2 flex items-center hover:bg-gray-200">
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg class="w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>
                                    </span>
                                    <p class="text-sm font-semibold text-gray-900">Mon profil</p>
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{ route('profile.show') }}" class="w-full block rounded p-2 flex items-center hover:bg-gray-200">
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg class="w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"></path></svg>
                                    </span>
                                    <p class="text-sm font-semibold text-gray-900">Editer mon profil</p>
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{route('verset.create')}}" class="w-full block rounded p-2 flex items-center hover:bg-gray-200">
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                                    </span>
                                    <p class="text-sm font-semibold text-gray-900">Verset préféré</p>
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{route('convertir.create')}}" class="w-full block rounded p-2 flex items-center hover:bg-gray-200">
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg class="w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cross" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M352 128h-96V32c0-17.67-14.33-32-32-32h-64c-17.67 0-32 14.33-32 32v96H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h96v224c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32V256h96c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32z"></path></svg>
                                    </span>
                                    <p class="text-sm font-semibold text-gray-900">J'accepte Jésus-Christ</p>
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{route('priere.create')}}" class="w-full block rounded p-2 flex items-center hover:bg-gray-200">
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg class="w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="praying-hands" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M272 191.91c-17.6 0-32 14.4-32 32v80c0 8.84-7.16 16-16 16s-16-7.16-16-16v-76.55c0-17.39 4.72-34.47 13.69-49.39l77.75-129.59c9.09-15.16 4.19-34.81-10.97-43.91-14.45-8.67-32.72-4.3-42.3 9.21-.2.23-.62.21-.79.48l-117.26 175.9C117.56 205.9 112 224.31 112 243.29v80.23l-90.12 30.04A31.974 31.974 0 0 0 0 383.91v96c0 10.82 8.52 32 32 32 2.69 0 5.41-.34 8.06-1.03l179.19-46.62C269.16 449.99 304 403.8 304 351.91v-128c0-17.6-14.4-32-32-32zm346.12 161.73L528 323.6v-80.23c0-18.98-5.56-37.39-16.12-53.23L394.62 14.25c-.18-.27-.59-.24-.79-.48-9.58-13.51-27.85-17.88-42.3-9.21-15.16 9.09-20.06 28.75-10.97 43.91l77.75 129.59c8.97 14.92 13.69 32 13.69 49.39V304c0 8.84-7.16 16-16 16s-16-7.16-16-16v-80c0-17.6-14.4-32-32-32s-32 14.4-32 32v128c0 51.89 34.84 98.08 84.75 112.34l179.19 46.62c2.66.69 5.38 1.03 8.06 1.03 23.48 0 32-21.18 32-32v-96c0-13.77-8.81-25.99-21.88-30.35z"></path></svg>
                                    </span>
                                    <p class="text-sm font-semibold text-gray-900">Demande de prière</p>
                                </a>
                            </li>
                            @can('manage-users')
                            <li class="mb-1 hidden md:block">
                                <a href="{{route('admin.dashboard')}}" class="w-full block rounded p-2 flex items-center hover:bg-gray-200">
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg class="w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="users-cog" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M610.5 341.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5-6.7-21.6-18.2-41.2-33.2-57.4-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1-22.3-5-45-4.8-66.2 0-3.3.7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4-15 16.2-26.5 35.8-33.2 57.4-1 3.3.4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5 6.7 21.6 18.2 41.1 33.2 57.4 2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1 22.3 5 45 4.8 66.2 0 3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4 15-16.2 26.5-35.8 33.2-57.4 1-3.3-.4-6.8-3.3-8.5l-25.8-14.9zM496 368.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5 48.5 21.8 48.5 48.5-21.7 48.5-48.5 48.5zM96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm224 32c1.9 0 3.7-.5 5.6-.6 8.3-21.7 20.5-42.1 36.3-59.2 7.4-8 17.9-12.6 28.9-12.6 6.9 0 13.7 1.8 19.6 5.3l7.9 4.6c.8-.5 1.6-.9 2.4-1.4 7-14.6 11.2-30.8 11.2-48 0-61.9-50.1-112-112-112S208 82.1 208 144c0 61.9 50.1 112 112 112zm105.2 194.5c-2.3-1.2-4.6-2.6-6.8-3.9-8.2 4.8-15.3 9.8-27.5 9.8-10.9 0-21.4-4.6-28.9-12.6-18.3-19.8-32.3-43.9-40.2-69.6-10.7-34.5 24.9-49.7 25.8-50.3-.1-2.6-.1-5.2 0-7.8l-7.9-4.6c-3.8-2.2-7-5-9.8-8.1-3.3.2-6.5.6-9.8.6-24.6 0-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h255.4c-3.7-6-6.2-12.8-6.2-20.3v-9.2zM173.1 274.6C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path></svg>
                                    </span>
                                    <p class="text-sm font-semibold text-gray-900">Administration</p>
                                </a>
                            </li>
                            @endcan
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <!-- Team Management -->
                            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Team') }}
                                </div>

                                <!-- Team Settings -->
                                <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                    {{ __('Team Settings') }}
                                </x-jet-dropdown-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                        {{ __('Create New Team') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                <div class="border-t border-gray-100"></div>

                                <!-- Team Switcher -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Switch Teams') }}
                                </div>

                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-jet-switchable-team :team="$team" />
                                @endforeach

                                <div class="border-t border-gray-100"></div>
                            @endif

                            <!-- logout -->
                            <li class="border-t-2 pt-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a 
                                        href="{{ route('logout') }}" 
                                        onclick="event.preventDefault(); this.closest('form').submit();" 
                                        class="w-full block rounded p-2 flex items-center hover:bg-gray-200"
                                    >
                                        <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" role="img" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M16 13L16 11 7 11 7 8 2 12 7 16 7 13z"></path><path d="M20,3h-9C9.897,3,9,3.897,9,5v4h2V5h9v14h-9v-4H9v4c0,1.103,0.897,2,2,2h9c1.103,0,2-0.897,2-2V5C22,3.897,21.103,3,20,3z"></path></svg>
                                        </span>
                                        <p class="text-sm text-gray-900 font-semibold">Déconnexion</p>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>

            <!-- Contrôle du compte -->
            <div class="hidden sm:flex items-center space-x-3 z-10">
                <!-- Créer -->
                <div 
                    x-data="{ isOpen: false, isActive: false, activeForm: '' }"  
                    x-cloak
                    class="relative"
                >
                    <button
                        aria-label="Créer"
                        data-title="Créer"
                        class="w-8 h-8 md:w-10 md:h-10 grid place-items-center rounded-full border md:border-2 text-gray-600 bg-gray-200 hover:bg-red-200 hover:text-red-600 main__link"
                        :class="{ 
                                    'bg-red-200 text-red-600' : isOpen,
                                    'hover:bg-red-200 hover:text-red-600 main__link' : (window.innerWidth >= 768)
                                }"
                        @click="isOpen = !isOpen"
                    >
                        <svg class="w-6 h-6 md:w-8 md:h-8" aria-hidden="true" focusable="false" role="img" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    </button>
                    <section 
                        x-show="isOpen"
                        x-cloak
                        class="absolute w-64 bg-white border-t rounded shadow transform translate-y-2 md:translate-y-3 -translate-x-1/2 dropdown__content"
                        @click.away="isOpen = false"
                    >
                        <h1 class="text-base md:text-lg font-bold text-gray-900 my-2 px-2">Créer</h1>
                        <ul 
                            class="overflow-y-auto p-2 space-y-1"
                            @click="isOpen = false"
                        >
                            <li>
                                <a 
                                    href="#publication_form" 
                                    class="w-full block rounded p-2 flex items-start hover:bg-gray-200"
                                    @click.prevent="isActive = !isActive; $nextTick(() => { activeForm = 'publication_form' });"
                                >
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path transform="rotate(45.001 19.345 4.656)" d="M17.223 3.039H21.466V6.273H17.223z"></path><path d="M8 16L11 16 18.287 8.713 15.287 5.713 8 13z"></path><path d="M19,19H8.158c-0.026,0-0.053,0.01-0.079,0.01c-0.033,0-0.066-0.009-0.1-0.01H5V5h6.847l2-2H5C3.897,3,3,3.896,3,5v14 c0,1.104,0.897,2,2,2h14c1.104,0,2-0.896,2-2v-8.668l-2,2V19z"></path></svg>
                                    </span>
                                    <div>
                                        <p class="text-sm text-gray-900 font-bold">Publication</p>
                                        <p class="text-xs">Partagez une publication sur le fil d'actualité</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a 
                                    href="#temoignage_form" 
                                    class="w-full block rounded p-2 flex items-start hover:bg-gray-200"
                                    @click.prevent="isActive = !isActive; $nextTick(() => { activeForm = 'temoignage_form' });"
                                >
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" aria-hidden="true" focusable="false" role="img" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M20.664 3.478L8 8v7l.748.267-1.127 2.254c-.26.519-.281 1.123-.06 1.659.223.536.665.949 1.216 1.133l4.084 1.361c.205.068.416.101.624.101.741 0 1.451-.414 1.797-1.104l1.303-2.606 4.079 1.457c.65.233 1.336-.25 1.336-.941V4.419C22 3.728 21.314 3.245 20.664 3.478zM13.493 19.777L9.41 18.416l1.235-2.471 4.042 1.444L13.493 19.777zM4 15h2V8H4c-1.103 0-2 .897-2 2v3C2 14.103 2.897 15 4 15z"></path></svg>
                                    </span>
                                    <div>
                                        <p class="text-sm text-gray-900 font-bold">Témoignage</p>
                                        <p class="text-xs">Partagez votre témoignage pour édifier quelqu'un qui traverse votre situation</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a 
                                    href="#temoignage_form" 
                                    class="w-full block rounded p-2 flex items-start hover:bg-gray-200"
                                    @click.prevent="isActive = !isActive; $nextTick(() => { activeForm = 'enseignement_form' });"
                                >
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                    </span>
                                    <div>
                                        <p class="text-sm text-gray-900 font-bold">Enseignement</p>
                                        <p class="text-xs">Partagez un enseignement pour éclairer des personnes</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a 
                                    href="#evenement_form" 
                                    class="w-full block rounded p-2 flex items-start hover:bg-gray-200"
                                    @click.prevent="isActive = !isActive; $nextTick(() => { activeForm = 'evenement_form' });"
                                >
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg class="w-4 h-4" aria-hidden="true" focusable="false" data-prefix="far" data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path></svg>
                                    </span>
                                    <div>
                                        <p class="text-sm text-gray-900 font-bold">Évènement</p>
                                        <p class="text-xs">Partagez votre évènement pour  attirer plus de personne</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </section>

                    <!-- Section de création de contenu -->
                    <section
                        x-show="isActive"
                        x-cloak
                        class="w-screen h-screen bg-black bg-opacity-25 fixed left-0 top-0 z-50 grid place-items-center py-3 px-2"
                        id="creer_forms"
                    >

                        <!-- Publication -->
                        <section
                            x-show="activeForm === 'publication_form'"
                            x-cloak
                            @click.away="isActive = false"
                            id="publication_form"
                            class="bg-white w-full max-w-lg p-3 shadow-md rounded-md"
                        >
                            <form 
                                x-data="{ isFocused: false, text: '' }"
                                x-cloak
                                method="POST" 
                                action="{{route('post.store')}}" 
                                class="w-full" 
                                enctype="multipart/form-data"

                            >
                                @csrf

                                
                                <section 
                                  class=" px-2 py-3"
                                  :class="{'bg-white' : isFocused || text !== ''}" 
                                >
                                    <textarea 
                                        id="message"
                                        name="message" 
                                        rows="10"
                                        placeholder="Dites quelque chose à la communauté !"
                                        class="w-full block resize-none px-1 outline-none bg-transparent text-gray-700"
                                        @focusin="isFocused = true"
                                        @focusout="isFocused = false"
                                        x-model="text"
                                    >{{old('message')?? old('message')}}</textarea>

                                    <!-- Preview -->
                                    <div class="mb-4">
                                      <h3 class="text-gray-800 font-semibold mb-1">Ajouter une image</h3>
                                      <div 
                                        x-data="{ hasImage: false }"
                                        x-cloak
                                        class="block w-full h-40 rounded grid place-items-center overflow-y-auto relative"
                                        :class="{
                                                  'border-dashed border-4 bg-gray-200' : !hasImage,
                                                  'border-2 border-gray-300' : hasImage,
                                                }"
                                    >
                                        <input 
                                          type="file" 
                                          class="hidden select_img"
                                          x-ref="fileInput"
                                          id="image_post" 
                                          name="image"
                                          accept="image/*" 
                                          @change="hasImage = ($event.target.files.length > 0) ? true : false"
                                        >

                                        <img src="" alt="" class="max-w-full h-auto hidden preview">
                                        
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
                                </section>

                                <button 
                                    type="submit" 
                                    class="w-full text-center bg-red-600 py-2 px-5 rounded text-xs text-white font-semibold hover:bg-red-700 focus:bg-red-700"
                                >Publier</button>
                            </form>

                            <script type="text/javascript">
                                
                            </script>
                        </section>

                        <!-- Témoignages -->
                        <section
                            x-show="activeForm === 'temoignage_form'"
                            x-cloak
                            @click.away="isActive = false"
                            id="temoignage_form"
                            class="bg-white w-full max-w-lg p-3 shadow-md rounded-md"
                        >
                            <form 
                                x-data="{ isFocused: false, text: '' }"
                                x-cloak
                                method="POST" 
                                action="{{route('temoignage.store')}}" 
                                class="w-full" 
                                enctype="multipart/form-data"

                            >
                                @csrf

                                
                                <section 
                                  class=" px-2 py-3"
                                  :class="{'bg-white' : isFocused || text !== ''}" 
                                >
                                    <textarea 
                                        id="message"
                                        name="message" 
                                        rows="10"
                                        placeholder="Dites quelque chose à la communauté !"
                                        class="w-full block resize-none px-1 outline-none bg-transparent text-gray-700"
                                        @focusin="isFocused = true"
                                        @focusout="isFocused = false"
                                        x-model="text"
                                    >{{old('message')?? old('message')}}</textarea>

                                    <!-- Preview -->
                                    <div class="mb-4">
                                      <h3 class="text-gray-800 font-semibold mb-1">Ajouter une image</h3>
                                      <div 
                                        x-data="{ hasImage: false }"
                                        x-cloak
                                        class="block w-full h-40 rounded grid place-items-center overflow-y-auto relative"
                                        :class="{
                                                  'border-dashed border-4 bg-gray-200' : !hasImage,
                                                  'border-2 border-gray-300' : hasImage,
                                                }"
                                    >
                                        <input 
                                          type="file" 
                                          class="hidden select_img"
                                          x-ref="fileInput"
                                          id="image_temoignage" 
                                          name="image"
                                          accept="image/*" 
                                          @change="hasImage = ($event.target.files.length > 0)? true : false"
                                        >

                                        <img src="" alt="" class="max-w-full h-auto hidden preview">

                                        <button
                                        class="text-gray-600 transition duration-100 ease-in focus:border-solid focus:border"
                                          :class="{ 'bg-white p-2 rounded-md hover:bg-gray-300' : !hasImage,
                                                    'bg-gray-200 px-2 py-1 hover:bg-gray-300 rounded absolute top-0 right-0 transform translate-y-1 -translate-x-1 leading-none' : hasImage,
                                                  }"
                                          x-on:click.prevent="$refs.fileInput.click()"
                                        >
                                          <span x-show="hasImage"  x-cloak class="text-xs font-semibold">changer l'image</span>
                                          <svg x-show="!hasImage" x-cloak class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </button>
                                      </div>
                                   </div>
                                </section>

                                <button 
                                    type="submit" 
                                    class="w-full text-center bg-red-600 py-2 px-5 rounded text-xs text-white font-semibold hover:bg-red-700 focus:bg-red-700"
                                >Partager témoignage</button>
                            </form>
                        </section>

                        <!-- Enseignements -->
                        <section
                            x-show="activeForm === 'enseignement_form'"
                            x-cloak
                            @click.away="isActive = false"
                            id="enseignement_form"
                            class="bg-white w-full max-w-lg p-3 shadow-md rounded-md"
                        >
                            <form 
                                x-data="{ isFocused: false, text: '' }"
                                x-cloak
                                method="POST" 
                                action="{{route('enseignement.store')}}" 
                                class="w-full" 
                                enctype="multipart/form-data"

                            >
                                @csrf

                                
                                <section 
                                  class=" px-2 py-3"
                                  :class="{'bg-white' : isFocused || text !== ''}" 
                                >
                                    <textarea 
                                        id="message"
                                        name="message" 
                                        rows="10"
                                        placeholder="Dites quelque chose à la communauté !"
                                        class="w-full block resize-none px-1 outline-none bg-transparent text-gray-700"
                                        @focusin="isFocused = true"
                                        @focusout="isFocused = false"
                                        x-model="text"
                                    >{{old('message')?? old('message')}}</textarea>

                                    <!-- Preview -->
                                    <div class="mb-4">
                                      <h3 class="text-gray-800 font-semibold mb-1">Ajouter une image</h3>
                                      <div 
                                        x-data="{ hasImage: false }"
                                        x-cloak
                                        class="block w-full h-40 rounded grid place-items-center overflow-y-auto relative"
                                        :class="{
                                                  'border-dashed border-4 bg-gray-200' : !hasImage,
                                                  'border-2 border-gray-300' : hasImage,
                                                }"
                                    >
                                        <input 
                                          type="file" 
                                          class="hidden select_img"
                                          x-ref="fileInput"
                                          id="image_enseignement" 
                                          name="image"
                                          accept="image/*" 
                                          @change="hasImage = ($event.target.files.length > 0)? true : false"
                                        >

                                        <img src="" alt="" class="max-w-full h-auto hidden preview">
                                       
                                        <button
                                        class="text-gray-600 transition duration-100 ease-in focus:border-solid focus:border"
                                          :class="{ 'bg-white p-2 rounded-md hover:bg-gray-300' : !hasImage,
                                                    'bg-gray-200 px-2 py-1 hover:bg-gray-300 rounded absolute top-0 right-0 transform translate-y-1 -translate-x-1 leading-none' : hasImage,
                                                  }"
                                          x-on:click.prevent="$refs.fileInput.click()"
                                        >
                                          <span x-show="hasImage"  x-cloak class="text-xs font-semibold">changer l'image</span>
                                          <svg x-show="!hasImage" x-cloak class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </button>
                                      </div>
                                   </div>
                                </section>

                                <button 
                                    type="submit" 
                                    class="w-full text-center bg-red-600 py-2 px-5 rounded text-xs text-white font-semibold hover:bg-red-700 focus:bg-red-700"
                                >Partager enseignement</button>
                            </form>
                        </section>

                        <!-- Evènements -->
                        <section
                            x-show="activeForm === 'evenement_form'"
                            x-cloak
                            @click.away="isActive = false"
                            id="evenement_form"
                            class="bg-white w-full max-w-lg p-3 shadow-md rounded-md"
                        >
                            <form 
                                x-data="{ isFocused: false, text: '' }"
                                x-cloak
                                method="POST" 
                                action="{{route('evenement.store')}}" 
                                class="w-full" 
                                enctype="multipart/form-data"

                            >
                                @csrf

                                
                                <section 
                                  class=" px-2 py-3"
                                  :class="{'bg-white' : isFocused || text !== ''}" 
                                >
                                    <textarea 
                                        id="message"
                                        name="message" 
                                        rows="10"
                                        placeholder="Dites quelque chose à la communauté !"
                                        class="w-full block resize-none px-1 outline-none bg-transparent text-gray-700"
                                        @focusin="isFocused = true"
                                        @focusout="isFocused = false"
                                        x-model="text"
                                    >{{old('message')?? old('message')}}</textarea>

                                    <!-- Preview -->
                                    <div class="mb-4">
                                     <h3 class="text-gray-800 font-semibold mb-1">Ajouter une image</h3>
                                     <div 
                                        x-data="{ hasImage: false }"
                                        x-cloak
                                        class="block w-full h-40 rounded grid place-items-center overflow-y-auto relative"
                                        :class="{
                                                  'border-dashed border-4 bg-gray-200' : !hasImage,
                                                  'border-2 border-gray-300' : hasImage,
                                                }"
                                    >
                                        <input 
                                          type="file" 
                                          class="hidden select_img"
                                          x-ref="fileInput"
                                          id="image_evenement" 
                                          name="image"
                                          accept="image/*" 
                                          @change="hasImage = ($event.target.files.length > 0)? true : false"
                                        >

                                        <img src="" alt="" class="max-w-full h-auto hidden preview">

                                        <button
                                        class="text-gray-600 transition duration-100 ease-in focus:border-solid focus:border"
                                          :class="{ 'bg-white p-2 rounded-md hover:bg-gray-300' : !hasImage,
                                                    'bg-gray-200 px-2 py-1 hover:bg-gray-300 rounded absolute top-0 right-0 transform translate-y-1 -translate-x-1 leading-none' : hasImage,
                                                  }"
                                          x-on:click.prevent="$refs.fileInput.click()"
                                        >
                                          <span x-show="hasImage"  x-cloak class="text-xs font-semibold">changer l'image</span>
                                          <svg x-show="!hasImage" x-cloak class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </button>
                                      </div>
                                   </div>
                                </section>

                                <button 
                                    type="submit" 
                                    class="w-full text-center bg-red-600 py-2 px-5 rounded text-xs text-white font-semibold hover:bg-red-700 focus:bg-red-700"
                                >Partager évènement</button>
                            </form>
                        </section>
                    </section>
                </div>

                <!-- Notifications -->
                <div
                    x-data="{ isOpen: false }"
                    x-cloak
                    class="relative"
                >
                    <button
                        aria-label="Notifications"
                        data-title="Notifications"
                        class="w-8 h-8 md:w-10 md:h-10 grid place-items-center rounded-full border md:border-2 text-gray-600 bg-gray-200 hover:bg-red-200 hover:text-red-600 main__link relative"
                        :class="{ 
                                    'bg-red-200 text-red-600' : isOpen,
                                    'hover:bg-red-200 hover:text-red-600 main__link' : (window.innerWidth >= 768)
                                }"
                        @click="isOpen = !isOpen"
                    >
                        <svg class="w-5 h-5 md:w-6 md:h-6 transform rotate-12" aria-hidden="true" focusable="false" role="img" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path></svg>
                        @if (auth()->user()->unreadNotifications->count() >0)
                            <span class="inline-block w-6 h-6 border border-white grid place-items-center absolute top-0 right-0 bg-blue-500 text-white text-xs text-center leading-none font-medium rounded-full transform translate-x-3 -translate-y-2">{{auth()->user()->unreadNotifications->count()}}</span>
                        @endif
                    </button>
                    <section 
                        x-show="isOpen"
                        x-cloak
                        class="absolute w-64 bg-white border-t rounded shadow transform translate-y-2 md:translate-y-3 -translate-x-1/2 dropdown__content"
                        @click.away="isOpen = false"
                    >
                        <h1 class="text-base md:text-lg font-bold text-gray-900 my-4 px-2">Notifications</h1>
                        <ul 
                            class="overflow-y-auto p-2 space-y-1"
                            @click="isOpen = false"
                        > 
                              @foreach(auth()->user()->unreadNotifications as $notification)
                                <li class="mb-1">
                                    <a href="{{route('show.notification',['topic'=>$notification->data['topic_id'], 'notification' => $notification->id])}}" class="w-full block rounded p-2 text-sm text-gray-600 hover:bg-gray-200 border-b" >
                                    {{$notification->data['name']}} a posté un commentaire sur {{$notification->data['topic_title']}}
                                  </a>
                             </li>
                             @endforeach
                        </ul>
                    </section>
                </div>

                <!-- Mon compte  -->
                <div
                    x-data="{ isOpen: false }"
                    x-cloak
                    class="relative"
                >
                    <button
                        aria-label="Mon Compte"
                        data-title="Mon Compte"
                        class="w-8 h-8 md:w-10 md:h-10 grid place-items-center rounded-full border md:border-2 text-gray-600 bg-gray-200"
                        :class="{ 'hover:bg-red-200 hover:text-red-600 main__link' : (window.innerWidth >= 768) }"
                        @click="isOpen = !isOpen"
                    >
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <img class="h-full w-full rounded-full object-cover overflow-hidden object-center" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        @else
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        @endif
                    </button>
                    <section 
                        x-show="isOpen"
                        x-cloak
                        class="absolute w-64 bg-white border-t rounded shadow transform translate-y-2 md:translate-y-3 translate-x-8 xl:translate-x-3 right-0 dropdown__content"
                        @click.away="isOpen = false"
                    >
                        <h1 class="text-baes md:text-lg font-bold text-gray-900 my-4 p-2">Mon Compte</h1>
                        <ul class="overflow-y-auto p-2 space-y-1">
                            <li class="mb-1">
                                <a href="{{ route('profil.index',Auth::user())}}" class="w-full block rounded p-2 flex items-center hover:bg-gray-200">
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg class="w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>
                                    </span>
                                    <p class="text-sm font-semibold text-gray-900">Mon profil</p>
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{ route('profile.show') }}" class="w-full block rounded p-2 flex items-center hover:bg-gray-200">
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg class="w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"></path></svg>
                                    </span>
                                    <p class="text-sm font-semibold text-gray-900">Editer mon profil</p>
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{route('verset.create')}}" class="w-full block rounded p-2 flex items-center hover:bg-gray-200">
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                                    </span>
                                    <p class="text-sm font-semibold text-gray-900">Verset préféré</p>
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{route('convertir.create')}}" class="w-full block rounded p-2 flex items-center hover:bg-gray-200">
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg class="w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cross" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M352 128h-96V32c0-17.67-14.33-32-32-32h-64c-17.67 0-32 14.33-32 32v96H32c-17.67 0-32 14.33-32 32v64c0 17.67 14.33 32 32 32h96v224c0 17.67 14.33 32 32 32h64c17.67 0 32-14.33 32-32V256h96c17.67 0 32-14.33 32-32v-64c0-17.67-14.33-32-32-32z"></path></svg>
                                    </span>
                                    <p class="text-sm font-semibold text-gray-900">J'accepte Jésus-Christ</p>
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="{{route('priere.create')}}" class="w-full block rounded p-2 flex items-center hover:bg-gray-200">
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg class="w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="praying-hands" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M272 191.91c-17.6 0-32 14.4-32 32v80c0 8.84-7.16 16-16 16s-16-7.16-16-16v-76.55c0-17.39 4.72-34.47 13.69-49.39l77.75-129.59c9.09-15.16 4.19-34.81-10.97-43.91-14.45-8.67-32.72-4.3-42.3 9.21-.2.23-.62.21-.79.48l-117.26 175.9C117.56 205.9 112 224.31 112 243.29v80.23l-90.12 30.04A31.974 31.974 0 0 0 0 383.91v96c0 10.82 8.52 32 32 32 2.69 0 5.41-.34 8.06-1.03l179.19-46.62C269.16 449.99 304 403.8 304 351.91v-128c0-17.6-14.4-32-32-32zm346.12 161.73L528 323.6v-80.23c0-18.98-5.56-37.39-16.12-53.23L394.62 14.25c-.18-.27-.59-.24-.79-.48-9.58-13.51-27.85-17.88-42.3-9.21-15.16 9.09-20.06 28.75-10.97 43.91l77.75 129.59c8.97 14.92 13.69 32 13.69 49.39V304c0 8.84-7.16 16-16 16s-16-7.16-16-16v-80c0-17.6-14.4-32-32-32s-32 14.4-32 32v128c0 51.89 34.84 98.08 84.75 112.34l179.19 46.62c2.66.69 5.38 1.03 8.06 1.03 23.48 0 32-21.18 32-32v-96c0-13.77-8.81-25.99-21.88-30.35z"></path></svg>
                                    </span>
                                    <p class="text-sm font-semibold text-gray-900">Demande de prière</p>
                                </a>
                            </li>
                            @can('manage-users')
                            <li class="mb-1 hidden md:block">
                                <a href="{{route('admin.dashboard')}}" class="w-full block rounded p-2 flex items-center hover:bg-gray-200">
                                    <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                        <svg class="w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="users-cog" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M610.5 341.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5-6.7-21.6-18.2-41.2-33.2-57.4-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1-22.3-5-45-4.8-66.2 0-3.3.7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4-15 16.2-26.5 35.8-33.2 57.4-1 3.3.4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5 6.7 21.6 18.2 41.1 33.2 57.4 2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1 22.3 5 45 4.8 66.2 0 3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4 15-16.2 26.5-35.8 33.2-57.4 1-3.3-.4-6.8-3.3-8.5l-25.8-14.9zM496 368.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5 48.5 21.8 48.5 48.5-21.7 48.5-48.5 48.5zM96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm224 32c1.9 0 3.7-.5 5.6-.6 8.3-21.7 20.5-42.1 36.3-59.2 7.4-8 17.9-12.6 28.9-12.6 6.9 0 13.7 1.8 19.6 5.3l7.9 4.6c.8-.5 1.6-.9 2.4-1.4 7-14.6 11.2-30.8 11.2-48 0-61.9-50.1-112-112-112S208 82.1 208 144c0 61.9 50.1 112 112 112zm105.2 194.5c-2.3-1.2-4.6-2.6-6.8-3.9-8.2 4.8-15.3 9.8-27.5 9.8-10.9 0-21.4-4.6-28.9-12.6-18.3-19.8-32.3-43.9-40.2-69.6-10.7-34.5 24.9-49.7 25.8-50.3-.1-2.6-.1-5.2 0-7.8l-7.9-4.6c-3.8-2.2-7-5-9.8-8.1-3.3.2-6.5.6-9.8.6-24.6 0-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h255.4c-3.7-6-6.2-12.8-6.2-20.3v-9.2zM173.1 274.6C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path></svg>
                                    </span>
                                    <p class="text-sm font-semibold text-gray-900">Administration</p>
                                </a>
                            </li>
                            @endcan
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <!-- Team Management -->
                            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Team') }}
                                </div>

                                <!-- Team Settings -->
                                <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                    {{ __('Team Settings') }}
                                </x-jet-dropdown-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                        {{ __('Create New Team') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                <div class="border-t border-gray-100"></div>

                                <!-- Team Switcher -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Switch Teams') }}
                                </div>

                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-jet-switchable-team :team="$team" />
                                @endforeach

                                <div class="border-t border-gray-100"></div>
                            @endif

                            <!-- logout -->
                            <li class="border-t-2 pt-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a 
                                        href="{{ route('logout') }}" 
                                        onclick="event.preventDefault(); this.closest('form').submit();" 
                                        class="w-full block rounded p-2 flex items-center hover:bg-gray-200"
                                    >
                                        <span class="w-8 h-8 rounded-full grid place-items-center flex-shrink-0 mr-2 bg-gray-400 text-gray-900">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" role="img" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M16 13L16 11 7 11 7 8 2 12 7 16 7 13z"></path><path d="M20,3h-9C9.897,3,9,3.897,9,5v4h2V5h9v14h-9v-4H9v4c0,1.103,0.897,2,2,2h9c1.103,0,2-0.897,2-2V5C22,3.897,21.103,3,20,3z"></path></svg>
                                        </span>
                                        <p class="text-sm text-gray-900 font-semibold">Déconnexion</p>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>

        <!-- Barre de menu -->
        <div class="lg:hidden flex-shrink-0 text-red-700 grid place-items-center ml-4">
            <!-- Pour les écrans moyens -->
            <button 
                class="hidden sm:block focus:outline-none"
                @click="showSidemenu = !showSidemenu"
            >
                <svg class="w-8 h-8" aria-hidden="true" focusable="false" role="img" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>

            <!-- Pour les martphones -->
            <button 
                class="block sm:hidden focus:outline-none"
                @click="showSidemenu = !showSidemenu"
            >
                <svg class="w-6 h-6" aria-hidden="true" focusable="false" role="img" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
            </button>
        </div>
    </nav>

    <script type="text/javascript">
        const inputs = document.querySelectorAll('.select_img');

        inputs.forEach(input => {
            input.addEventListener('change', function(){
                const file = input.files[0];
                const preview = input.parentNode.querySelector('.preview');

                if (file) {
                    let reader = new FileReader();

                    reader.onloadend = function() {
                       preview.setAttribute('src', reader.result);
                       preview.setAttribute('alt', file.name);
                       preview.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                }
                else {
                    preview.setAttribute('src', "");
                    preview.setAttribute('alt', "");
                }
            }, false);
        });
    </script>
</header>
   
            

    

