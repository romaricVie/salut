<x-app-layout>
    <x-slot name="title">Accueil</x-slot>

    <section class="w-full flex items-center py-4 px-0 flex-col-reverse sm:px-2 md:flex-row md:items-start">
        
        <section class="w-full text-gray-700">
            <!-- Verset du jour -->
          <article class="w-full bg-white mx-auto py-2 overflow-hidden border-b-2 border-gray-300 sm:mb-2 sm:border-none sm:shadow sm:max-w-xl sm:rounded-md relative">

          @if(isset($verset))
            <figure class="px-3 text-sm sm:text-base font-semibold text-gray-600">
              <p class="font-bold underline">Verset du jour:</p>
              <blockquote>
                <p><?=nl2br($verset->text)?> <cite class="ml-2 text-sm font-medium">{{$verset->book.' '.$verset->chapter.':'.$verset->verse}}</cite></p>
              </blockquote>
            </figure>
          @else
            <p class="px-3 text-sm sm:text-base font-semibold text-gray-600">Pas de verset disponible !</p>
          @endif
        </article>
        <!-- Post's section -->
        @if($posts->count() >0)
              @foreach($posts as $post)
                  <livewire:like-post :post="$post"/>
              @endforeach
              <a href="{{route('dashboard.display_all')}}">
                  <button class="block mx-auto mt-4 bg-red-600 p-2 rounded-md text-sm text-white font-semibold hover:bg-red-700 focus:bg-red-700">
                          Afficher tout
                 </button>
             </a>
          @else
           <p class="text-sm sm:text-base font-semibold text-gray-600">Aucun post disponible pour l'instant!</p>
          @endif
        </section>

        <!-- Aside Content -->
        <aside
           id="addingPost"
           class="w-full max-w-xl mb-4 flex-shrink-0 md:sticky md:w-auto md:max-w-auto md:mb-0 md:ml-2 xl:ml-0"
        >
            <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
                @csrf 
                @include('partials/_form',['textButton' => 'Publier'])
            </form>
        </aside>
    </section>
    
</x-app-layout>
