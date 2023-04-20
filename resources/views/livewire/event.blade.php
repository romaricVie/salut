<article class="w-full bg-white mx-auto py-2 overflow-hidden border-b-2 border-gray-300 sm:mb-2 sm:border-none sm:shadow sm:max-w-xl sm:rounded-md relative">
  <!-- Article Header -->
  <section class="w-full flex items-start px-2 mb-3">
      <a href="{{route('profil.index',$event->user)}}" class="mr-3" title="Photo de profil de {{$event->user->name.' '.$event->user->firstname}}">
          <img 
              src="{{$event->user->profile_photo_url}}" 
              alt=""
              class="w-8 h-8 rounded-full border object-center object-cover sm:w-10 sm:h-10"
          >
      </a>
      <div>
          <a href="{{route('profil.index',$event->user)}}" class="inline-block font-semibold text-gray-800 text-sm lg:text-lg">{{$event->user->name.' '.$event->user->firstname}}</a>
          <p class="timeago text-xs font-semibold" title="{{$event->created_at}}">{{$event->created_at}}</p>
      </div>
  </section>

  <!-- Article Body -->
  <section class="w-full text-sm pt-1 lg:text-base">
      <!-- Post text -->
      <p class="mb-4 px-3 postTextContent"><?=replace_links(nl2br($event->message))?></p>

      <!-- Post images -->
      @if($event->image)
      <div class="post__img">
          <a href="{{asset('storage/'.$event->image)}}" class="w-full block">
              <img 
                  src="{{asset('storage/'.$event->image)}}" 
                  alt="Image illustrative du event"
                  class="w-full h-auto"
              >
          </a>
      </div>
      @endif
  </section>

  <!-- Article Footer -->
  <section class="px-3 border-t border-gray-200 pt-2">
      <div class="flex items-center text-gray-600">
          <button class="{{$event->isLiked() ? 'text-red-700' : 'text-gray-600'}} focus:outline-none" wire:click="addLike">
              <svg class="w-6 h-6" fill="{{$event->isLiked() ? '#c53030' : '#fff'}}" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
          </button>
          <span class="text-sm ml-1 font-semibold">{{$countLike > 0 ? $countLike:'' }}</span>
      </div>
  </section>

  <!-- Option section -->
  @can('delete',$event)
    <section x-data="{ isOpen: false }"  x-cloak class="absolute top-0 right-0 px-2 pt-2">
      <button 
        class="focus:outline-none focus:text-red-700"
        @click.prevent="isOpen = !isOpen"
      >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
      </button>
      <div 
        x-show="isOpen"
        x-cloak
        @click.away="isOpen = false"
        class="inline-block absolute bottom-0 right-0 transform translate-y-full -translate-x-2 bg-white" 
      >
        <div>
          <form 
            action="{{route('post.destroy',$event)}}"
            method="POST"
            class="d-inline"
            onsubmit ="return confirm('Êtes-vous sûr de vouloir supprimer ce poste ?');"
          >
            @csrf
            @method('DELETE')
              <button type="submit" class="flex items-center text-gray-600 font-light text-xs px-2 py-1 border border-gray-300 rounded select-none bg-gray-300 sm:bg-white hover:bg-gray-300 hover:text-red-500">
                <svg class="w-4 h-4 text-red-500 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                <span class="leading-tight hidden sm:inline-block">Supprimer</span>
              </button>
          </form>
        </div>
      </div>
    </section>
  @endcan

</article>


<!-- Ajout de la date de diffusion de l'article -->
<script type="text/javascript" src="{{asset('/assets/js/getPostTime.js')}}"></script>

