@extends('template.master',['title'=>'Enseignements'])

@section('content')

  <main class="px-10 pt-10 pb-6">
    <h1 class="text-xl font-extrabold text-gray-700 mb-10">Pages signalées (<span class="text-red-500">{{$signals->count()}}</span>)</h1>

    <section class="bg-white p-4 rounded-md">
      @if($signals->count()>0)

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
              @foreach($signals as $signal)

                <tr class="text-sm text-gray-600">
                  <td>{{$signal->id}}</td>
                  <td>
                    <a href="{{route('communaute.show',$signal->communaute)}}" class="text-gray-600 hover:text-gray-600 hover:underline">{{$signal->communaute->name}}</a>
                  </td>
                  <td>{{$signal->created_at}}</td>
                  <td>
                    <a href="{{route('admin.show.signal',$signal)}}" class="text-xs bg-green-500 px-2 py-1 rounded-sm font-light text-white">Voir page</a>
                  </td>
                </tr>

              @endforeach
            </tbody>
          </table>
        </div>
         <div class="mt-4">
          {{$signals->links()}}
       </div>


      @else

        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <strong>Aucune page signalée pour l'instant!</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      @endif
    </section>
  </main>
  <script type="text/javascript" src="{{asset('/assets/js/getPostTime.js')}}"></script>
@endsection