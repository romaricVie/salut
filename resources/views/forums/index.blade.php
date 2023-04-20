<x-app-layout>
  <x-slot name="title">Forum</x-slot>

  <header class="fixed top-0 left-0 w-full z-30 pt-4 pl-4 select-none">
    <a href="{{ route('dashboard') }}" class="text-lg text-red-700 font-bold"><x-jet-application-mark/></a>
  </header>

  <section id="forum">

    <!-- Banner -->
    <section 
      x-data="{}"
      x-cloak
      class="w-full bg-gray-300 bg-no-repeat bg-center bg-cover relative banner"
      :class="{ '__xs' : window.innerWidth < 640 }"
    >
      <div class="w-full max-w-md mx-auto bg-gray-800 p-2 rounded shadow-md absolute transform -translate-x-1/2 -translate-y-20 sm:-translate-y-full sm:bg-white sm:p-3">
        <h1 class="text-white font-black text-lg mb-1 sm:text-gray-800 md:text-xl">Créez un sujet de discussion</h1>
        <p class="text-white font-medium text-sm leading-tight sm:text-gray-600 md:text-base">Le Forum de discussion est un espace public où les membres de la communauté peuvent échanger librement sur des sujets de leur choix.</p>
      </div>
    </section>

    <section class="max-w-screen-lg block mx-auto pt-10 pb-4 px-2 lg:flex lg:flex-row lg:items-start">
      <!-- Post's section -->
      <section class="w-full">
        @foreach($topics as $topic)
          <article class="w-full bg-white mx-auto py-2 overflow-hidden mb-2 shadow max-w-xl rounded-md">
            <!-- Article Header -->
            <section class="w-full flex items-start px-2 mb-3">
              <a href="{{route('profil.index',$topic->user)}}" class="mr-3" title="Photo de profil de {{$topic->user->name.' '.$topic->user->firstname}}">
                <img 
                  src="{{$topic->user->profile_photo_url}}" 
                  alt=""
                  class="w-8 h-8 rounded-full border object-center object-cover sm:w-10 sm:h-10"
                >
              </a>
              <div>
                <a href="{{route('profil.index',$topic->user)}}" class="inline-block font-semibold text-gray-800 text-sm lg:text-lg">{{$topic->user->name.' '.$topic->user->firstname}}</a>
                <p class="timeago text-xs font-semibold" title="{{$topic->created_at}}"></p>
              </div>
            </section>

            <!-- Article Body -->
            <section class="w-full pt-1 px-2">
              <a 
                href="{{route('forum.show',$topic)}}" 
                title="{{$topic->title}}"
                class="text-lg font-bold text-gray-800 hover:underline" 
              ><?= substr($topic->title, 0, 100)?></a>
               <!-- Article Body -->
               <p class="text-sm font-semibold text-gray-800 sm:text-base md:text-sm"><?=replace_links(nl2br($topic->content))?></p>
            </section>

            <!-- Article Footer -->
            <section class="px-3 pt-2">
              @if($topic->comments->count()>0)
                <a href="{{route('forum.show',$topic)}}" class="flex items-center text-gray-600 font-semibold text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 24 24" fill="currentColor"><path d="M4,18h1h1v4.081L11.101,18H12h4c1.103,0,2-0.897,2-2V8c0-1.103-0.897-2-2-2H4C2.897,6,2,6.897,2,8v8 C2,17.103,2.897,18,4,18z"></path><path d="M20,2h-1h-2.002H9H8C6.897,2,6,2.897,6,4h3h7.586H18c1.103,0,2,0.897,2,2v1.414V11v3c1.103,0,2-0.897,2-2v-1V7V5V4 C22,2.897,21.103,2,20,2z"></path></svg>
                  <span class="text-sm ml-1 font-semibold">{{$topic->comments->count()}} réactions</span>
                </a>
              @else
                <a href="{{route('forum.show',$topic)}}" class="flex items-center text-gray-600 font-semibold text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 24 24" fill="currentColor"><path d="M4,18h1h1v4.081L11.101,18H12h4c1.103,0,2-0.897,2-2V8c0-1.103-0.897-2-2-2H4C2.897,6,2,6.897,2,8v8 C2,17.103,2.897,18,4,18z"></path><path d="M20,2h-1h-2.002H9H8C6.897,2,6,2.897,6,4h3h7.586H18c1.103,0,2,0.897,2,2v1.414V11v3c1.103,0,2-0.897,2-2v-1V7V5V4 C22,2.897,21.103,2,20,2z"></path></svg>
                  <span class="text-sm ml-1 font-semibold">Soyez la première personne à réagir...</span>
                </a>
              @endif
            </section>
          </article>
        @endforeach
      </section>


      <!-- Aside Content -->
      <aside
        x-data="{ isSmall: false, isActive: false }"
        x-cloak
        class="lg:w-full lg:max-w-sm lg:ml-4 lg:flex-shrink-0 lg:sticky"
        :class="{ 
                  'fixed bottom-0 right-0 transform -translate-y-4 -translate-x-4 sm:-translate-y-4' : ((isSmall || window.innerWidth < 1024) && !isActive),
                  'up' : !(isSmall || window.innerWidth < 1024),
                  'w-screen h-screen bg-gray-900 bg-opacity-25 grid place-items-center fixed top-0 left-0 __zIndex p-4' : ((isSmall || window.innerWidth < 1024) && isActive)
                }"
        @resize.window="isSmall = (window.innerWidth < 1024)? true : false"
      >
        <template x-if="((isSmall || window.innerWidth < 1024) && !isActive)">
          <button 
            class="__shadow w-8 h-8 rounded-full text-white grid place-items-center bg-red-700 sm:w-10 sm:h-10"
            @click.prevent="isActive = !isActive; $nextTick(() => { $refs.input.focus() });"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="currentColor"><path d="M20,2H4C2.897,2,2,2.894,2,3.992v12.016C2,17.106,2.897,18,4,18h3v4l6.351-4H20c1.103,0,2-0.894,2-1.992V3.992 C22,2.894,21.103,2,20,2z M17,11h-4v4h-2v-4H7V9h4V5h2v4h4V11z"></path></svg>
          </button>
        </template>


        <section 
          class="lg:block"
          :class="{ 'hidden' : ((isSmall || window.innerWidth < 1024) && !isActive),
                    'w-full max-w-sm block bg-white py-3 rounded shadow' : ((isSmall || window.innerWidth < 1024) && isActive) 
                  }"
        >
          <x-jet-validation-errors class="mb-4"/>
          
          <form method="POST" action="{{route('forum.store')}}" class="w-full px-2" @click.away="isActive = false">
            @csrf
            <h1 class="text-center text-gray-800 font-bold mb-8 text-lg">Créez un sujet de discussion</h1>

            <!-- Subject title -->
            <div class="mb-2">
              <x-jet-label for="title" value="{{ __('Thème') }}" />
              <x-jet-input 
                  id="title" 
                  class="w-full bg-gray-300 focus:bg-gray-200" 
                  type="text" 
                  name="title" 
                  :value="old('title')" 
                  placeholder="Ex: La vie de prière" 
                  required 
                  x-ref="input" 
              />
            </div>

            <!-- Subject content -->
            <div x-data="{ isFocused: false }" x-cloak >
              <x-jet-label for="content" value="{{ __('Sujet') }}" />
              <div 
                class="rounded-md border-transparent mt-1 overflow-hidden"
                :class="{ 'border border-red-400' : isFocused }"
              >
                <textarea
                  id="content"
                  name="content"
                  class="w-full block resize-none rounded-md shadow-none bg-gray-300 font-haireline text-sm px-3 py-2 outline-none focus:bg-gray-200 placeholder-gray-600"
                  rows="6"
                  required
                  placeholder="Ex: J'aimerais savoir comment prier efficacement."
                  @focusin="isFocused = true"
                  @focusout="isFocused = false"
                ></textarea>
              </div>
            </div>

            <button 
              type="submit" 
              class="w-full flex items-center justify-center mt-6 bg-red-600 p-2 rounded-md text-sm text-white font-semibold hover:bg-red-700 focus:bg-red-700"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-4" viewBox="0 0 24 24" fill="currentColor"><path d="M20,2H4C2.897,2,2,2.894,2,3.992v12.016C2,17.106,2.897,18,4,18h3v4l6.351-4H20c1.103,0,2-0.894,2-1.992V3.992 C22,2.894,21.103,2,20,2z M17,11h-4v4h-2v-4H7V9h4V5h2v4h4V11z"></path></svg>
              <span>{{ __('Créer la discussion') }}</span>
            </button>
          </form>
        </section>
      </aside>
    </section>
  </section>



  <!-- SCRIPTS -->
  <script type="text/javascript">
     
    $(document).ready(function() {
      $(".timeago").timeago();
    });

   //Actualisation automatique de la date
    $(".timeago").livequery(function(){
      $(this).timeago();
    });
  </script>

  <!-- Suppression les menu du haut et de gauche -->
  <script type="text/javascript" src="{{asset('/assets/js/removeMenus.js')}}"></script>
</x-app-layout>


