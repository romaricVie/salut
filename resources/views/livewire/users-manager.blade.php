<div>
  <div class="flex items-center justify-between spaace-x-4 mb-4">
    <div class="">
      <input type="text" wire:model="query" class="form-control" placeholder="Recheche utilisateur" autocomplete="off">
    </div>

    <div class="flex items-center text-gray-600 font-medium">
      Afficher
      <select wire:model.lazy="perPage" id="Per-page" class="custom-select mx-2">
        @for($i=5; $i <= 25; $i += 5)
          <option value="{{$i}}">{{$i}}</option>
        @endfor
      </select>
      par page
    </div>
  </div>



  <!-- Ancien -->

  @if($users->count()> 0)

    <!-- TABLEAU -->
    <div class="table-responsive">
      <table class="w-full table" id="table">
        <thead class="bg-gray-200 text-gray-800">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénoms</th>
            <th scope="col">Email</th>
            <th scope="col">Roles</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>

        <tbody>
          @foreach($users as $user)

            <tr class="text-sm text-gray-600">
              <td>{{$user->id}}</td>
              <td>
                <a href="{{route('profil.index',$user)}}" class="text-gray-600 hover:text-gray-600 hover:underline">{{$user->name}}</a>
              </td>
              <td>{{$user->firstname}}</td>
              <td>
                <a href="mailto:{{$user->email}}" class="text-indigo-600 hover:text-indigo-600 hover:underline">{{$user->email}}</a>
              </td>
              <!--Récuperer les données sous forme de tableau-->
              <td>
                <span class="text-xs bg-indigo-500 text-white rounded-sm py-1 px-2 select-none">{{implode(',',$user->roles()->get()->pluck('name')->toArray())}}</span>
              </td>
              <td class="flex items-start space-x-1">
                <!--Gates edit-users--->
               
                  <a href="{{route('admin.edit',$user)}}" class="flex items-center bg-green-500 text-white hover:bg-green-600 px-2 py-1 rounded-sm">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                    </svg>
                    <span class="text-xs">Editer</span>
                  </a>
                
                 <!--Gates delete-users--->
                
                    <form 
                     action="{{route('admin.destroy',$user)}}"
                     method="POST"
                     class="d-inline"
                     onsubmit ="return confirm('Etre vous sur de vouloir supprimer cet utilisateur?');"
                    >
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="flex items-center bg-red-500 text-white hover:bg-red-600 px-2 py-1 rounded-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        <span class="text-xs">Supprimer</span>
                      </button>
                 </form>
             </td>
            </tr>

          @endforeach
        </tbody>
      </table>
    </div> 

    <div class="mt-4">
      {{$users->links()}}
    </div>

  @else

    <div class="alert alert-warning">
      <p>Aucun resultat disponible pour la recherche "{{$query}}"</p>
    </div>

  @endif
</div>






