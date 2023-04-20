@extends('template.master',['title'=>$contact->objet])

@section('content')
  <main class="px-10 pt-10 pb-6">

    <div class="flex space-x-5 items-center mb-10">
      <a href="{{route('admin.contact.index')}}" class="flex-shrink-0 flex items-center text-blue-600 text-xs uppercase m-0">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        <span>Retour</span>
      </a>
      <h1 class="text-xl font-extrabold text-gray-700">&#91;{{$contact->objet}}&#93;</h1>
    </div>

    
    <div class="w-full bg-white mx-auto py-2 overflow-hidden border-b-2 border-gray-300 sm:mb-2 sm:border-none sm:shadow sm:max-w-xl sm:rounded-md relative">
      <section class="w-full flex items-start px-2 mb-3">
        <div>
           <span class="font-bold uppercase no-underline ">{{$contact->name.' '.$contact->firstname}}</span>
            <i>Envoyé le {{$contact->created_at}}</i>
        </div>
      </section>

      <!-- Article Body -->
      <section class="w-full text-sm pt-1 lg:text-base">
        <!-- Post text -->
        <p class="mb-4 px-3">{{$contact->objet}}</p>
        <p class="mb-4 px-3"><?=replace_links(nl2br($contact->message))?></p>
      </section>
      
      <div  class="px-2">
        <div class="bg-gray-100 p-2 rounded space-y-0 mb-3">
          <h3 class="text-xs uppercase text-gray-500 font-bold underline">Coordonnées</h3>
          <p class="text-sm text-gray-600 font-medium"><span>Id: </span><span class="font-bold">{{$contact->id}}</span></p>
          <p class="text-sm text-gray-600 font-medium"><span>Téléphone: </span><span class="font-bold">{{$contact->phone}}</span></p>
          <p class="text-sm text-gray-600 font-medium"><span>Email: </span><a href="mailto:{{$contact->email}}" class="font-bold">{{$contact->email}}</a></p>
        </div>
        <form 
          action="{{route('admin.contact.destroy',$contact)}}"
          method="POST"
          onsubmit ="return confirm('Etre vous sur de vouloir supprimer ce contact?');"
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
  </main>
@endsection

<!-- 
    <div>
       <h1 class="text-center">[<span style="color: red">{{$contact->objet}}</span>]</h1>





         <div class="max-w-screen-md mx-auto px-3 py-5 mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-300">
          <span class="font-bold uppercase no-underline ">{{$contact->name.' '.$contact->firstname}}</span>
                 <i>[ {{$contact->objet}} ]</i>
                <div class="m-2 text-center">
                    <p><?= nl2br($contact->message)?></p>
              </div>
              <div class="mb-2">

                  <i class="fa fa-phone" aria-hidden="true"></i> <span>{{$contact->phone}}</span><br>
                  <i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:{{$contact->email}}">{{$contact->email}}</a><br>
                  <i class="fa fa-clock-o" aria-hidden="true"></i> <span>{{$contact->created_at}}</span>
              </div>
              <div>
                <a href="{{route('admin.contact.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a>
                <form 
                  action="{{route('admin.contact.destroy',$contact)}}"
                  method="POST"
                  class="d-inline"
                  onsubmit ="return confirm('Etre vous sur de vouloir supprimer cet don?');"
                  >
                  @csrf
                  @method('DELETE')
                  <a href=""><button type="submit" class="btn btn-warning"><i class="fa fa-trash"></i> Supprimer</button></a>
              </form>
            </div>
         </div>
   </div> -->
