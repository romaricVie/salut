@extends('template.master',['title'=>'Demande de prière'])

@section('content')

  <main class="px-10 pt-10 pb-6">

    <div class="flex space-x-5 items-center mb-10">
      <a href="{{route('admin.index.prieres')}}" class="flex-shrink-0 flex items-center text-blue-600 text-xs uppercase">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        <span>Retour</span>
      </a>
      <h1 class="text-xl font-extrabold text-gray-700">&#40;<span class="text-red-500">{{$user->prieres->count()}}</span>&#41; Demande{{$user->prieres->count() >1 ? 's' :''}} de prière pour &#91;{{$user->name}}&#93;</h1>
    </div> 

    @if($user->prieres->count() >0)

      @foreach($user->prieres as $priere)
        <div class="w-full bg-white mx-auto py-2 overflow-hidden border-b-2 border-gray-300 sm:mb-2 sm:border-none sm:shadow sm:max-w-xl sm:rounded-md relative">
          <section class="w-full flex items-start px-2 mb-3">
            <a href="{{route('profil.index',$priere->user)}}" class="mr-3" title="Photo de profil de {{$priere->user->name.' '.$priere->user->firstname}}">
              <img 
                src="{{$priere->user->profile_photo_url}}" 
                alt=""
                class="w-8 h-8 rounded-full border object-center object-cover sm:w-10 sm:h-10"
              >
            </a>
            <div>
              <a href="{{route('profil.index',$priere->user)}}" class="inline-block font-semibold text-gray-800 text-sm lg:text-lg">{{$priere->user->name.' '.$priere->user->firstname}}</a>
              <p class="timeago text-xs font-semibold">{{$priere->start_at}}</p>
            </div>
          </section>

          <!-- Article Body -->
          <section class="w-full text-sm pt-1 lg:text-base">
            <!-- priere text -->
            <p class="mb-4 px-3"><?=replace_links(nl2br($priere->subject))?></p>

            <!-- priere images -->
            @if($priere->image)

              <div class="">
                <a href="{{asset('storage/'.$priere->image)}}" class="w-full block">
                  <img 
                    src="{{asset('storage/'.$priere->image)}}" 
                    alt="Image illustrative priere"
                    class="w-full h-auto"
                  >
                </a>
              </div>

            @endif
          </section>

          <section class="px-2">
            <div class="bg-gray-100 p-2 rounded space-y-0 mb-3">
              <h3 class="text-xs uppercase text-gray-500 font-bold underline">Coordonnées</h3>
              <p class="text-sm text-gray-600 font-medium"><span>Id: </span><span class="font-bold">{{$priere->id}}</span></p>
              <p class="text-sm text-gray-600 font-medium"><span>Téléphone: </span><span class="font-bold">{{$priere->phone}}</span></p>
              <p class="text-sm text-gray-600 font-medium"><span>Email: </span><a href="mailto:{{$priere->email}}" class="font-bold">{{$priere->email}}</a></p>
            </div>

            
            <form 
              action="{{route('admin.destroy.priere',$priere)}}"
              method="POST"
              onsubmit ="return confirm('Etre vous sur de vouloir supprimer ce sujet?');"
            >
              @csrf
              @method('DELETE')
                <button type="submit" class="flex items-center text-sm text-red-500 border border-red-500 px-2 py-1 rounded space-x-2 hover:text-white hover:bg-red-500">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                  <span>Supprimer</span>
                </button>
            </form>
          </section>
          
        </div>
      @endforeach

    @else

      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Aucune demande disponible pour [{{$user->name}}]</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>

    @endif
 </main>
@endsection 













<!-- 

 @if($user->prieres->count() >0)
<h1 class="text-center">(<span style="color: red">{{$user->prieres->count()}}</span>) Demande{{$user->prieres->count() >1 ? 's' :''}} de prière pour ({{$user->name}})</h1>
  @foreach($user->prieres as $priere)
<div>
  <div class="max-w-screen-md mx-auto px-3 py-5 mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-300">
      <div class="mb-8">
              <a href="{{route('profil.index',$priere->user)}}" class="no-underline hover:no-underline focus:outline-none"><span class="font-bold uppercase no-underline ">{{$priere->user->name.' '.$priere->user->firstname}}</span>
                </a><i> publié le {{$priere->created_at}}</i>
                 <img src="{{$priere->user->profile_photo_url}}" title="Photo de profil de {{$priere->user->firstname}}" class="h-20 w-20">
                 <div class="m-2">
                    <p class="text-base font-semibold break-all"><?=replace_links(nl2br($priere->subject))?></p>
                 </div>
               <div>
                  @if($priere->image)
                     <div class="mb-8">
                       <a href="{{asset('storage/'.$priere->image)}}"><img src="{{asset('storage/'.$priere->image)}}"></a>
                     </div>
                @endif 
               </div>
               <div class="mb-2">
                 <i class="fa fa-phone" aria-hidden="true"></i> <span>{{$priere->phone}}</span><br>
                <i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:{{$priere->email}}">{{$priere->email}}</a><br>
               </div>
              <div>
                <form 
                  action="{{route('admin.destroy.priere',$priere)}}"
                  method="POST"
                  class="d-inline"
                  onsubmit ="return confirm('Etre vous sur de vouloir supprimer ce sujet?');"
                  >
                  @csrf
                  @method('DELETE')
                  <a href=""><button class="btn btn-warning"><i class="fa fa-trash"></i> Supprimer</button></a>
              </form>
      </div>
             
           </div>      
      </div>
 </div>
 @endforeach
 @else
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Aucune demande disponible pour cet utilisateur!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
 -->
 

