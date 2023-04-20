<x-app-layout>
  <x-slot name="title">{!!$publication->communaute->name!!} commentaires</x-slot>

  <section
    x-data="{ atTop: false }"
    x-cloak
    id="forum__discussion" 
    class="min-h-full bg-gray-300 bg-fixed bg-no-repeat bg-center bg-contain bg-clip-border"
    @scroll.window="atTop = (window.pageYOffset > 60) ? true : false"
  >
    <!-- Discussion's title -->
    <div 
      class="w-full flex items-center bg-white p-2 shadow-md text-sm font-extrabold text-gray-800 sm:p-3 sm:text-base md:text-xl"
      :class="{ 'fixed py-1 z-20 sm:py-2' : atTop }"
    >
      <a href="{{route('communaute.show', $publication->communaute)}}" title="Quitter commentaire" class="flex-shrink-0 mr-2 sm:mr-4 text-gray-600 focus:outline-none">
        <svg class="w-5 h-5 hidden sm:block" aria-hidden="true" focusable="false" role="img" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>

        <svg class="w-5 h-5 sm:hidden" aria-hidden="true" focusable="false" role="img" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
        </svg>
      </a>
    </div>
  

    <!-- Post's section -->
    <section class="max-w-screen-md mx-auto pt-2 px-2 pb-2 sm:pb-20">

      <!-- post -->
      <section class="w-full">

        <!-- Discussion's subject -->
        <article class="w-full bg-white mx-auto py-2 overflow-hidden border-b-2 border-gray-300 sm:mb-2 sm:border-none sm:shadow sm:max-w-xl sm:rounded-md relative">
              <!-- Article Header -->
              <section class="w-full flex items-start px-2 mb-3">
                  <a href="{{route('communaute.show',$publication->communaute)}}" class="mr-3" title="Photo de profil de {{$publication->communaute->name}}">
                      <img 
                          src="{{asset('storage/'.$publication->communaute->image)}}" 
                          alt=""
                          class="w-8 h-8 rounded-full border object-center object-cover sm:w-10 sm:h-10"
                      >
                  </a>
                  <div>
                      <a href="{{route('communaute.show',$publication->communaute)}}" class="inline-block font-semibold text-gray-800 text-sm lg:text-lg">{{$publication->communaute->name}}</a>
                      <p class="timeago text-xs font-semibold" title="{{$publication->created_at}}"></p>
                  </div>
              </section>

            <!-- Article Body -->
              <section class="w-full text-sm pt-1 lg:text-base">
                  <!-- Post text -->
                  <p class="mb-4 px-3 postTextContent"><?=replace_links(nl2br($publication->message))?></p>

                  <!-- Post images -->
                  @if($publication->image)
                  <div class="post__img">
                      <a href="{{Storage::url($publication->image)}}" class="w-full block">
                          <img 
                              src="{{Storage::url($publication->image)}}" 
                              alt="Image illustrative du post"
                              class="w-full h-auto"
                          >
                      </a>
                  </div>
                  @endif
         </section>

            <!-- Article Footer -->
            <section class="px-3 border-t border-gray-200 pt-2">

                  <div class="flex items-center text-gray-600">
                    @if($publication->commentaires->count()>0)
                    <svg class="inline-block w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg><span>{{$publication->commentaires->count()}}</span>
                    @else
                     <svg class="inline-block w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>Commenter
                    @endif
                </div>

            </section>

      <!-- Option section -->
  </article>


    <!-- Discussion's reactions -->
    <section class="mt-10 flex flex-col items-start pr-2 sm:pr-0 sm:px-2">
         @foreach($publication->commentaires as $comment)
            <article class="flex flex-row items-start mb-1 max-w-screen-sm relative bg-transparent sm:mb-3">
              <!-- User image -->
              <a href="{{route('profil.index',$comment->user)}}" class="mr-3 flex-shrink-0 rounded-full" title="Photo de profil de {{$comment->user->name.' '.$comment->user->firstname}}">
                <img 
                  src="{{$comment->user->profile_photo_url}}" 
                  alt=""
                  class="w-6 h-6 rounded-full border border-gray-100 object-center object-cover sm:w-8 sm:h-8"
                >
              </a>
              <!-- User comment -->
              <section class="w-auto inline-block px-2 py-1 bg-white rounded mt-1 relative shadow-lg sm:py-2 comment__content">
                <!-- Article Header -->
                <div class="mb-1 pr-4">
                  <a href="{{route('profil.index',$comment->user)}}" class="inline-block font-semibold text-gray-800 text-sm lg:text-md truncate">{{$comment->user->name.' '.$comment->user->firstname}}</a>
                  <p class="timeago text-xs font-normal" title="{{$comment->created_at}}">{{$comment->created_at}}</p>
                </div>

                <!-- Article Body -->
                <div>
                  <p class="py-2 text-sm text-gray-800 sm:text-base postTextContent"><?=replace_links(nl2br($comment->comment))?></p>
                </div>
              </section>
              <!-- Option section -->
              @can('delete',$comment)
                <section x-data="{ isOpen: false }" x-cloak class="absolute top-0 right-0 grid place-items-center transform -translate-x-1 translate-y-3">
                  <button 
                    class="focus:outline-none focus:text-red-700"
                    @click.prevent="isOpen = !isOpen"
                  >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                  </button>
                  <div 
                    x-show="isOpen"
                    x-cloak
                    @click.away="isOpen = false"
                    class="inline-block absolute bottom-0 right-0 transform translate-y-full -translate-x-2 bg-white" 
                  >
                    <div>
                      <form 
                        action="{{route('commentaire.destroy',$comment)}}"
                        method="POST"
                        class="d-inline"
                        onsubmit ="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');"
                      >
                        @csrf
                        @method('DELETE')
                          <button type="submit" class="flex items-center text-gray-600 font-light text-xs px-2 py-1 border border-gray-300 rounded select-none bg-gray-300 sm:bg-white hover:bg-gray-300 hover:text-red-500">
                            <svg class="w-4 h-4 text-red-500 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            <span class="leading-tight hidden sm:inline-block">Supprimer</span>
                          </button>
                      </form>
                    </div>
                  </div>
                </section>
              @endcan
            </article>
          @endforeach
        </section>
      </section>


      <!-- Aside Content -->
      <aside
        class="w-full max-w-xl flex-shrink-0 fixed bottom-0 transform -translate-x-1/2 border-t-2 border-gray-400 bg-white px-2 rounded-md sm:-translate-y-4 sm:border-none sm:bg-transparent sm:px-0 sm:rounded-none"
      >
        <x-jet-validation-errors class="mb-4"/>
        
        <form 
          x-data="{}"
          x-cloak
          method="POST" 
          action="{{route('commentaire.store',$publication)}}"
          class="flex items-baseline" 
        >
          @csrf
          <div 
            class="w-full flex overflow-hidden sm:border sm:border-gray-400 sm:rounded-md"
          >
            <textarea
              id="comment"
              name="comment"
              class="w-full resize-none rounded-md shadow-none bg-white font-haireline text-xs p-1 outline-none placeholder-gray-600 sm:px-3 sm:py-2 sm:text-sm"
              :class="{ 'focus:bg-gray-200' : window.innerWidth >= 640 }"
              rows="1"
              required
              placeholder="Ecrivez votre réaction ici..."
            ></textarea>
          </div>

          <button 
            type="submit" 
            class="flex items-center flex-shrink-0 ml-2 p-2 rounded-md text-xs text-red-700 font-semibold sm:text-white sm:bg-red-600 md:text-sm"
            :class="{ 'hover:bg-red-700 focus:bg-red-700' : window.innerWidth >= 640 }"
          >
            <span class="hidden sm:inline-block">{{ __('Commenter') }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:ml-2" viewBox="0 0 24 24" fill="currentColor"><path d="M21.426,11.095l-17-8c-0.35-0.164-0.763-0.113-1.061,0.133C3.066,3.473,2.937,3.868,3.03,4.242l1.212,4.849L12,12 l-7.758,2.909L3.03,19.758c-0.094,0.374,0.036,0.77,0.335,1.015C3.548,20.923,3.772,21,4,21c0.145,0,0.29-0.031,0.426-0.095l17-8 C21.776,12.74,22,12.388,22,12S21.776,11.26,21.426,11.095z"></path></svg>
          </button>
        </form>
      </aside>
    </section>
  </section>


  <!-- SCRIPTS -->
  <!-- Ajout de la date de diffusion de l'article -->
  <script type="text/javascript" src="{{asset('/assets/js/getPostTime.js')}}"></script>

  <!-- Suppression les menu du haut et de gauche -->
  <script type="text/javascript" src="{{asset('/assets/js/removeMenus.js')}}"></script>
</x-app-layout>


