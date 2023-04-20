@extends('template.master',['title'=>'Nouveaux-convertis'])

@section('content')

  <main class="px-10 pt-10 pb-6">
    <h1 class="text-xl font-extrabold text-gray-700 mb-10">Nouveaux convertis (<span class="text-red-500">{{$totals->count()}}</span>)</h1>

    <section class="bg-white p-4 rounded-md">
      @if($convertis->count()>0)


        <!-- TABLEAU -->
        <div class="">
          <table class="w-full table" id="table">
            <thead class="bg-gray-200 text-gray-800">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom et prenom.s utilisateur</th>
                <th scope="col">Date de publication</th>
                <th scope="col"></th>
              </tr>
            </thead>

            <tbody>
              @foreach($convertis as $converti)

                <tr class="text-sm text-gray-600">
                  <td>{{$converti->id}}</td>
                  <td>
                    <a href="{{route('profil.index',$converti->user)}}" class="text-gray-600 hover:text-gray-600 hover:underline">{{$converti->user->name.' '.$converti->user->firstname}}</a>
                  </td>
                  <td>{{$converti->created_at}}</td>
                  <td>
                    <a href="{{route('admin.show.convertir',$converti->user)}}" class="text-xs bg-green-500 px-2 py-1 rounded-sm font-light text-white">Voir détails</a>
                  </td>
                </tr>

              @endforeach
            </tbody>
          </table>
        </div>
        <div class="mt-4">
            {{$convertis->links()}}
       </div>
      @else
      
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <strong>Pas de converti pour l'instant!</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      @endif
    </section>
  </main>

@endsection