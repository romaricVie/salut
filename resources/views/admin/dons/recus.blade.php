@extends('template.master',['title'=>'Dons-recus'])

@section('content')

  <main class="px-10 pt-10 pb-6">

    <div class="flex space-x-5 items-center mb-10">
      <h1 class="text-xl font-extrabold text-gray-700">Donations réçues &#40;<span class="text-red-500">{{$totals->count()}}</span>&#41;</h1>
    </div>

    <section class="bg-white p-4 rounded-md">
      @if($dons->count()>0)
      
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
              @foreach($dons as $don)

                <tr class="text-sm text-gray-600">
                  <td>{{$don->id}}</td>
                  <td>{{$don->name.' '.$don->firstname}}</td>
                  <td>{{$don->created_at}}</td>
                  <td>
                    <a href="{{route('admin.show.donation',$don)}}" class="text-xs bg-green-500 px-2 py-1 rounded-sm font-light text-white">Voir don.s</a>
                  </td>
                </tr>

              @endforeach
            </tbody>
          </table>
        </div>
        <div class="mt-4">
          {{$dons->links()}}
       </div>
      @else

        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <strong>Aucune donation disponible pour l'instant!</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      @endif
    </section>
  </main>

@endsection