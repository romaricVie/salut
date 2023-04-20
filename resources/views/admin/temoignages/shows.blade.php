@extends('template.master',['title'=>$user->name])

 @section('content')
  <main class="px-10 pt-10 pb-6">
    <div class="flex space-x-5 items-center mb-10">
      <a href="{{route('admin.index.temoignages')}}" class="flex-shrink-0 flex items-center text-blue-600 text-xs uppercase">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        <span>Retour</span>
      </a>
      <h1 class="text-xl font-extrabold text-gray-700">&#40;<span class="text-red-500">{{$posts->count()}}</span>&#41; Témoignage{{$posts->count() >1 ? 's' :''}} de &#91;{{$user->name}}&#93;</h1>
    </div>

    @if($posts->count()>0)
      @foreach($posts as $post)

        <div class="w-full bg-white mx-auto py-2 overflow-hidden border-b-2 border-gray-300 sm:mb-2 sm:border-none sm:shadow sm:max-w-xl sm:rounded-md relative">
          <section class="w-full flex items-start px-2 mb-3">
            <a href="{{route('profil.index',$post->user)}}" class="mr-3" title="Photo de profil de {{$post->user->name.' '.$post->user->firstname}}">
              <img 
                src="{{$post->user->profile_photo_url}}" 
                alt=""
                class="w-8 h-8 rounded-full border object-center object-cover sm:w-10 sm:h-10"
              >
            </a>
            <div>
              <a href="{{route('profil.index',$post->user)}}" class="inline-block font-semibold text-gray-800 text-sm lg:text-lg">{{$post->user->name.' '.$post->user->firstname}}</a>
              <p class="timeago text-xs font-semibold">{{$post->start_at}}</p>
            </div>
          </section>

          <!-- Article Body -->
          <section class="w-full text-sm pt-1 lg:text-base">
            <!-- temoignage text -->
            <p class="mb-4 px-3"><?=replace_links(nl2br($post->message))?></p>

            <!-- post images -->
            @if($post->image)
              <div class="">
                <a href="{{asset('storage/'.$post->image)}}" class="w-full block">
                  <img 
                    src="{{asset('storage/'.$post->image)}}" 
                    alt="Image illustrative du post"
                    class="w-full h-auto"
                  >
                </a>
              </div>
            @endif
          </section>


          <div class="flex items-center space-x-2 p-2">
            <h5 class="text-xs rounded mb-0 px-2 py-1 badge-{{$post->status == 'INACTIF' ? 'danger' : 'success'}}">{{$post->status}}</h5>

            <form 
              method="POST" 
              action="{{route('admin.update.temoignages',$post)}}"
              class="d-inline" 
            >
              @csrf
              @method('PATCH')
                <button type="submit" class="flex items-center text-sm text-green-500 border border-green-500 px-2 py-1 rounded space-x-2 hover:text-white hover:bg-green-500">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                  <span>Appouver</span>
                </button>
            </form> 
          
            <form 
              action="{{route('admin.destroy.temoignages',$post)}}"
              method="POST"
              onsubmit ="return confirm('Etre vous sur de vouloir supprimer cet poste?');"
            >
              @csrf
              @method('DELETE')
                <button type="submit" class="flex items-center text-sm text-red-500 border border-red-500 px-2 py-1 rounded space-x-2 hover:text-white hover:bg-red-500">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                  <span>Supprimer</span>
                </button>
            </form>
          </div>
        </div>
    @endforeach
    @else
       <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Aucun témoignage disponible pour [{{$user->name}}]</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>
    @endif
 </main>
@endsection