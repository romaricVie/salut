@extends('template.master',['title'=>'Versets'])

@section('content')

  <main class="px-10 pt-10 pb-6">
    <h1 class="text-xl font-extrabold text-gray-700 mb-10">Versets bibliques (<span class="text-red-500">{{$versets->count()}}</span>)</h1>

    <section class="bg-white p-4 rounded-md">
      <div class="mb-6">
        <a href="{{route('admin.create.versets')}}" class="inline-flex items-center bg-red-600 text-white hover:text-white rounded-sm px-4 py-2">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
          </svg>
          <span class="font-semibold text-sm">Ajouter verset</span>
        </a>
      </div>

      <div class="space-y-3">
        @foreach($versets as $verset)

          <div 
            x-data="{ isOpen: false }"
            class="relative max-w-xl p-3 rounded-md border text-gray-700"
          >
            <div class="mb-2">
              <p class="font-semibold break-all leading-none"><?=nl2br($verset->text)?></p>
              <p class="text-sm font-semibold leading-none">{{$verset->book.' '.$verset->chapter.':'.$verset->verse}}</p>
            </div>
            <p class="text-sm">Sera publier le: <em class="text-red-600 font-bold">{{$verset->display_at}}</em></p>

            <!-- Option -->
            <div x-data="{ isOpen: false }" class="absolute top-0 right-0 px-2 pt-2">
              <button 
                class="focus:outline-none focus:text-red-700"
                @click.prevent="isOpen = !isOpen"
              >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
              </button>
              <div 
                x-show="isOpen"
                @click.away="isOpen = false"
                class="inline-block absolute bottom-0 right-0 transform translate-y-full -translate-x-2 bg-white" 
              >
                <div class="space-y-1">
                  <a href="{{route('admin.edit.versets',$verset)}}" class="text-xs flex items-center bg-blue-500 text-white hover:bg-blue-600 px-2 py-1 rounded-sm">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                    </svg>
                    <span class="text-xs">Editer</span>
                  </a>

                   <form 
                       action="{{route('admin.destroy.versets',$verset)}}"
                       method="POST"
                       onsubmit ="return confirm('Etre vous sur de vouloir supprimer ce verset?');"
                       >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs flex items-center bg-red-500 text-white hover:bg-red-600 px-2 py-1 rounded-sm">
                               <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                <span class="text-xs">Supprimer</span>
                              </svg>
                         </button>
                   </form>
                </div>
              </div>
            </div>
          </div>

        @endforeach
      </div>
    </section>
  </main>





<!-- <h1 class="text-center">(<span style="color: red;">{{$versets->count()}}</span>) Versets Biblique &#x1f4d8; </h1>
<a href="{{route('admin.create.versets')}}"><button class="btn btn-success mb-2"><i class="fa fa-plus"></i> Ajouter Verset </button></a>
  @foreach($versets as $verset)
   <div class="max-w-screen-md mx-auto px-3 py-5 mb-3 mt-4 rounded-lg shadow-md hover:shadow-md  border-4 border-red-900">
        <div>
              <p class="text-lg break-all font-bold"><?=nl2br($verset->text)?></p>
              <small class="float-right text-base font-medium">{{$verset->book.' '.$verset->chapter.':'.$verset->verse}}</small>
            <span>Sera publier le: <em>{{$verset->display_at}}</em></span>
        </div>
         <div class="mt-2">
             <a href="{{route('admin.edit.versets',$verset)}}"><button class="btn btn-primary"><i class="fa fa-edit"></i> Changer</button></a>
         </div>
    </div>
 @endforeach -->
@endsection