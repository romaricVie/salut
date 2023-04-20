@extends('template.master',['title'=>'Dons'])

@section('content')
  <main class="px-10 pt-10 pb-6">

    <div class="flex space-x-5 items-center mb-10">
      <a href="{{route('admin.index.dons')}}" class="flex-shrink-0 flex items-center text-blue-600 text-xs uppercase m-0">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        <span>Retour</span>
      </a>
      <h1 class="text-xl font-extrabold text-gray-700">Donation de &#91;{{$don->name.' '.$don->firstname}}&#93;</h1>
    </div>

    <div class="w-full bg-white mx-auto py-2 overflow-hidden border-b-2 border-gray-300 sm:mb-2 sm:border-none sm:shadow sm:max-w-xl sm:rounded-md relative">
      <section class="w-full flex items-start px-2 mb-3">
        <div>
          <span class="font-bold uppercase no-underline ">{{$don->name.' '.$don->firstname}}</span>
          <i>Enrégistré le {{$don->created_at}}</i>
        </div>
      </section>

      <!-- Article Body -->
      <section class="w-full text-sm pt-1 lg:text-base">
        <!-- Post text -->
        <p class="mb-4 px-3">{{$don->nom_produit}}</p>
        <p class="mb-4 px-3"><?=replace_links(nl2br($don->description))?></p>

        <!-- Post images -->
        
        <div class="">
          <a href="{{asset('storage/'.$don->images)}}" class="w-full block">
            <img 
              src="{{asset('storage/'.$don->images)}}" 
              alt="Image illustrative du don"
              class="w-full h-auto"
            >
          </a>
        </div>
      </section>

      <div class="flex items-center space-x-2 p-2">

        <h5 class="text-xs rounded mb-0 px-2 py-1 badge-{{$don->status == 'INACTIF' ? 'danger' : 'success'}}">{{$don->status}}</h5>

        <form 
          method="POST" 
          action="{{route('admin.update.dons',$don)}}"
          class="d-inline" 
        >
          @csrf
          @method('PATCH')
            <button type="submit" class="flex items-center text-sm text-green-500 border border-green-500 px-2 py-1 rounded space-x-2 hover:text-white hover:bg-green-500">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
              <span>Réçu</span>
            </button>
        </form> 

        <form 
          action="{{route('admin.destroy.dons',$don)}}"
           method="POST"
          onsubmit ="return confirm('Etre vous sur de vouloir supprimer ce don?');"
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

    <!-- TABLEAU -->
    <section class="bg-white p-2 rounded-md max-w-xl mx-auto">
      <div class="overflow-x-auto w-full">
        <table class="w-full table" id="table">
          <thead class="bg-gray-200 text-gray-800">
            <tr class="text-xs">
              <th scope="col">id</th>
              <th scope="col">Téléphone</th>
              <th scope="col">Email</th>
              <th scope="col">Type</th>
              <th scope="col">Etat_don</th>
              <th scope="col">Point relais</th>
            </tr>
          </thead>
          <tbody>
            <tr class="text-sm text-gray-600">
              <td class="whitespace-no-wrap">2021{{$don->id}}</td>
              <td class="whitespace-no-wrap">{{$don->phone}}</td>
              <td class="whitespace-no-wrap"><a href="mailto:{{$don->email}}">{{$don->email}}</a></td>
              <td class="whitespace-no-wrap">{{$don->type}}</td>
              <td class="whitespace-no-wrap">{{$don->etat_don}}</td>
              <td class="whitespace-no-wrap">{{$don->point_relais}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>        
  </main>
@endsection
