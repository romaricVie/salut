@extends('template.master',['title'=>'Roles - '.$user->name])
@section('content')

  <main class="px-10 pt-10 pb-6">
    
    <div class="flex space-x-5 items-center mb-10">
      <a href="{{route('admin.index')}}" class="flex-shrink-0 flex items-center text-blue-600 text-xs uppercase m-0">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        <span>Retour</span>
      </a>
      <h1 class="text-xl font-extrabold text-gray-700">Edition des roles</h1>
    </div>

    <section class="bg-white p-4 rounded-md">
      <h3 class="text-base font-bold text-gray-600 mb-3">Modifier le rôle de l'adresse <b>#<a href="mailto:{{$user->email}}">{{$user->email}}</a></h3>

      <div>
        <form method="POST" action="{{route('admin.update',$user)}}" class="pl-3">
          @csrf
          @method('PATCH')
          
          @foreach($roles as $role)
            <div class="form-group m-0">
              <!-- Name est un tableaux de role -->
              <input 
                type="radio" 
                class="w-4 h-4" 
                name="roles[]" 
                value="{{$role->id}}" 
                id="{{$role->id}}" @if($user->roles->pluck('id')->contains($role->id)) checked @endif
              >
              <label for="{{$role->id}}" class="text-sm font-normal text-gray-600">{{$role->name}}</label>
            </div>
          @endforeach

          <button type="submit" class="btn btn-success text-sm mt-3">Modifier le rôle</button>

         </form>
      </div>
    </section>

  </main>
@endsection