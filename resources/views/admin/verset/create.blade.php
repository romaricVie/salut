@extends('template.master',['title'=>'Ajout-verset'])

@section('content')
<main class="px-10 pt-10 pb-6">

	<div class="flex space-x-5 items-center mb-10">
      <a href="{{route('admin.index.versets')}}" class="flex-shrink-0 flex items-center text-blue-600 text-xs uppercase m-0">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        <span>Retour</span>
      </a>
      <h1 class="text-xl font-extrabold text-gray-700">Ajouter un verset</h1>
    </div>

    <section class="bg-white p-4 rounded-md">
        <div>
            <form method="POST" action="{{route('admin.store.versets')}}">
                @csrf
                @include('admin/verset/partial/_form',['text'=>'Ajouter Verset'])
            </form>
        </div>
    </section>
</main>
@endsection