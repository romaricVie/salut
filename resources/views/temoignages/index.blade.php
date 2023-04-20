<x-app-layout>
  <x-slot name="title">Temoignages</x-slot>

  <section class="w-full flex items-center py-4 px-0 flex-col-reverse sm:px-2 md:flex-row md:items-start">
    <!-- Post's section -->
    <section class="w-full text-gray-700">
       @if($posts->count() > 0)
          @foreach($posts as $post)
             <livewire:like-post :post="$post"/>
           @endforeach
           <a href="{{route('temoignage.display_all')}}">
               <button class="block mx-auto mt-4 bg-red-600 p-2 rounded-md text-sm text-white font-semibold hover:bg-red-700 focus:bg-red-700">
             Afficher tout
            </button>
         </a>
      @else
     <p> Aucun témoignage pour l'instant!</p>
      @endif
    </section>

    <!-- Aside Content -->
    <aside
      id="addingPost"
      class="w-full max-w-xl mb-4 flex-shrink-0 md:sticky md:w-auto md:max-w-auto md:mb-0 md:ml-2 xl:ml-0"
    >
      <form method="POST" action="{{route('temoignage.store')}}" enctype="multipart/form-data" id="image-upload-preview">
        @csrf
        @include('partials/_form',['textButton' =>'Partager témoignage'])
      </form>
    </aside>
  </section>

</x-app-layout>


