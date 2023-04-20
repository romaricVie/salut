<x-app-layout>
  <x-slot name="title">
           Publications en attente
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Publications en attente d'approbation
        </h2>
    </x-slot>
  
      <div class="py-2 mb-4 sm:mb-6">
        <h1 class="px-2 text-center text-lg sm:text-xl md:text-2xl text-gray-600 font-bold">Mes publications en attente</h1>
      </div>
@if($postInactifs->count()>0)
  @foreach($postInactifs as $postInactif)
        <article class="w-full bg-white mx-auto py-2 sm:mt-2 overflow-hidden border-b-2 border-gray-300 sm:mb-2 sm:border-none sm:shadow sm:max-w-xl sm:rounded-md">
        <!-- Article Header -->
        <section class="w-full flex items-start px-2 mb-3">
            <a href="{{route('profil.index',$postInactif->user)}}" class="mr-3" title="Photo de profil de {{$postInactif->user->name.' '.$postInactif->user->firstname}}">
                <img 
                    src="{{$postInactif->user->profile_photo_url}}" 
                    alt=""
                    class="w-8 h-8 rounded-full border object-center object-cover sm:w-10 sm:h-10"
                >
            </a>
            <div>
                <a href="{{route('profil.index',$postInactif->user)}}" class="inline-block font-semibold text-gray-800 text-sm lg:text-lg">{{$postInactif->user->name.' '.$postInactif->user->firstname}}</a>
                <p class="timeago text-xs font-semibold" title="{{$postInactif->start_at}}"></p>
            </div>
        </section>

        <!-- Article Body -->
        <section class="w-full text-sm pt-1 lg:text-base">
            <!-- Post text -->
            <p class="mb-4 px-3 postTextContent"><?=replace_links(nl2br($postInactif->message))?></p>

            <!-- Post images -->
            @if($postInactif->image)
            <div class="post__img">
                <a href="{{asset('storage/'.$postInactif->image)}}" class="w-full block">
                    <img 
                        src="{{asset('storage/'.$postInactif->image)}}" 
                        alt="Image illustrative du post"
                        class="w-full h-auto"
                    >
                </a>
            </div>
            @endif
        </section>
        <!-- Article Footer -->
        </article>
   @endforeach
   @else
      <p class="text-center text-2xl font-semibold mt-3">Aucun poste disponible. </p>
@endif

<script type="text/javascript">
     
  $(document).ready(function() {
     $(".timeago").timeago();
    });

  //Actualisation automatique de la date
  $(".timeago").livequery(function(){
     $(this).timeago();
  });
</script>


</x-app-layout>


