@extends('template.master',['title'=>'Messages'])

@section('content')

  <main class="px-10 pt-10 pb-6">
    <h1 class="text-xl font-extrabold text-gray-700 mb-10">Boîte de reception (<span class="text-red-500">{{$totals->count()}}</span>)</h1>

    <section class="bg-white p-4 rounded-md">
      @if($contacts->count()>0)

        <!-- TABLEAU -->
        <div class="">
          <table class="w-full table" id="table">
            <thead class="bg-gray-200 text-gray-800">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom et prenom.s utilisateur</th>
                <th scope="col">Date de réception</th>
                <th scope="col"></th>
              </tr>
            </thead>

            <tbody>
              @foreach($contacts as $contact)

                <tr class="text-sm text-gray-600">
                  <td>{{$contact->id}}</td>
                  <td>{{$contact->name.' '.$contact->firstname}}</td>
                  <td>{{$contact->created_at}}</td>
                  <td>
                    <a href="{{route('admin.contact.show',$contact)}}" class="text-xs bg-green-500 px-2 py-1 rounded-sm font-light text-white">Voir message</a>
                  </td>
                </tr>

              @endforeach
            </tbody>
          </table>
        </div>
        <div class="mt-4">
          {{$contacts->links()}}
       </div>
      @else

        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <strong>Aucun message disponible pour l'instant!</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      @endif
    </section>
  </main>

@endsection