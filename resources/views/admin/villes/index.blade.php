@extends('template.master',['title'=>'Points relais'])

@section('content')
 <main class="px-10 pt-10 pb-6">
     <h1 class="text-xl font-extrabold text-gray-700 mb-10">Points relais(<span class="text-red-500">{{$villes->count()}}</span>)</h1>
      <section id="post-admin">
        <div class="bg-white p-4 rounded-md">
            <div class="mb-6">
              <a href="{{route('admin.create.villes')}}" class="inline-flex items-center bg-red-600 text-white hover:text-white rounded-sm px-4 py-2">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                <span class="font-semibold text-sm">Créer point relais</span>
              </a>
      </div>
           <!-- TABLEAU -->
        <div class="pt-5">
          <table class="w-full table" id="table">
            <thead class="bg-gray-200 text-gray-800">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Ville</th>
                <th scope="col">Nom du responsable</th>
                <th scope="col">Email</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($villes as $ville)
                <tr class="text-sm text-gray-600">
                  <td>{{$ville->id}}</td>
                  <td>{{$ville->name}}</td>
                  <td>{{$ville->responsable}}</td>
                  <td>{{$ville->email}}</td>
                  <td>{{$ville->phone}}</td>
                  <td>
                     <form 
                       action="{{route('admin.destroy.villes',$ville)}}"
                       method="POST"
                       onsubmit ="return confirm('Etre vous sur de vouloir supprimer ce point relais?');"
                       >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs flex items-center bg-red-500 text-white hover:bg-red-600 px-2 py-1 rounded-sm">
                               <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                <span class="text-xs">Supprimer</span>
                              </svg>
                         </button>
                   </form>
                  </td>
                </tr>
              @endforeach      
            </tbody>
          </table>
        </div>
      </div>
    </section>
 </main>
@endsection