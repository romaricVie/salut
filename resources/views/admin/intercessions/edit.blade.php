@extends('template.master',['title'=>'Editer-sujet'])

@section('content')
<main class="px-10 pt-10 pb-6">
   <h1 class="text-xl font-extrabold text-gray-700 mb-10">Edition de sujet</h1>
    <section class="bg-white p-4 rounded-md">
        <div>
          <form method="POST" action="{{route('admin.update.intercessions',$intercession)}}">
               @csrf
               @method('PATCH')
               @include('admin/intercessions/partial/_form',['text'=>'Modifier les sujets'])
        </form>
      </div>
    </section>
</main>
@endsection