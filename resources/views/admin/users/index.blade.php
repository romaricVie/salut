@extends('template.master',['title'=>'Utilisateurs'])

@section('content')

	<main class="px-10 pt-10 pb-6">
	    <h1 class="text-xl font-extrabold text-gray-700 mb-10">Gestion des utilisateurs (<span class="text-red-600">{{$membres->count()}}</span>)</h1>

	    <section class="bg-white p-4 rounded-md">
	        @livewire('users-manager')
	    </section>
	</main>

@endsection