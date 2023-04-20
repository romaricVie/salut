@extends('template.master',['title'=>'Edition-verset'])

@section('content')
<main class="px-10 pt-10 pb-6">
  <h1 class="text-xl font-extrabold text-gray-700 mb-10">Edition de verset</h1>
  <section class="bg-white p-4 rounded-md">
          <form method="POST" action="{{route('admin.update.versets',$verset)}}">
               @csrf
               @method('PATCH')
               @include('admin/verset/partial/_form',['text'=>'Changer Verset'])
        </form>
    </section>
</main>
@endsection