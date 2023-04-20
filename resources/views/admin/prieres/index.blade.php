@extends('template.master',['title'=>'Demande de prière'])

@section('content')

  <main class="px-10 pt-10 pb-6">
    <div class="flex space-x-5 items-center mb-10">
      <h1 class="text-xl font-extrabold text-gray-700">Demandes de prière &#40;<span class="text-red-500">{{$totals->count()}}</span>&#41;</h1>
    </div>

    <section class="bg-white p-4 rounded-md">
      @if($prieres->count()>0)

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
              @foreach($prieres as $priere)

                <tr class="text-sm text-gray-600">
                  <td>{{$priere->id}}</td>
                  <td>{{$priere->user->name.' '.$priere->user->firstname}}</td>
                  <td>{{$priere->created_at}}</td>
                  <td>
                    <a href="{{route('admin.shows.prieres',$priere->user)}}" class="text-xs bg-green-500 px-2 py-1 rounded-sm font-light text-white">Voir prière</a>
                  </td>
                </tr>

              @endforeach
            </tbody>
          </table>
        </div>
        <div class="mt-4">
          {{$prieres->links()}}
        </div>
      @else

        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <strong>Aucune demande de prière disponible pour l'instant!</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      @endif
    </section>
  </main>

@endsection 
