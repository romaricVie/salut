@extends('template.master',['title'=>$signal->communaute->name])

 @section('content')
  <main class="px-10 pt-10 pb-6">
     <a href="{{route('admin.index.signals')}}" class="flex-shrink-0 flex items-center text-blue-600 text-xs uppercase">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        <span>Retour</span>
      </a>

    <section class="p-4">
      @if($signal->count()>0)

          <div class="w-full bg-white mx-auto py-2 overflow-hidden border-b-2 border-gray-300 sm:mb-2 sm:border-none sm:shadow sm:max-w-xl sm:rounded-md relative">
            <section class="w-full flex items-start px-2 mb-3">
              <a href="{{route('communaute.show',$signal->communaute)}}" class="mr-3" title="Photo de page {{$signal->communaute->name}} ">
                <img 
                  src="{{asset('storage/'.$signal->communaute->image)}}" 
                  alt=""
                  class="w-8 h-8 rounded-full border object-center object-cover sm:w-10 sm:h-10"
                >
              </a>
              <div>
                <a href="{{route('communaute.show',$signal->communaute)}}" class="inline-block font-semibold text-gray-800 text-sm lg:text-lg">{{$signal->communaute->name}}</a>
                <p class="timeago text-xs font-semibold">{{$signal->created_at}}</p>
              </div>
            </section>

            <!-- Article Body -->
            <section class="w-full text-sm pt-1 lg:text-base">
              <!-- Post text -->
              <p class="mb-4 px-3"><?=replace_links(nl2br($signal->message))?></p>

              <!-- Post images -->
              @if($signal->image)
                <div class="">
                  <a href="{{asset('storage/'.$signal->image)}}" class="w-full block">
                    <img 
                      src="{{asset('storage/'.$signal->image)}}" 
                      alt="Image illustrative"
                      class="w-full h-auto"
                    >
                  </a>
                </div>
              @endif
            </section>

            <div class="flex items-center space-x-2 p-2">
              <h5 class="text-xs rounded mb-0 px-2 py-1 badge-{{$signal->communaute->status == 'OFF' ? 'danger' : 'success'}}">{{$signal->communaute->status}}</h5>

              <form 
                method="POST" 
                action="{{route('admin.bloquer.signal',$signal->communaute)}}"
              >
                @csrf
                  @method('PATCH')
                  <button type="submit" class="flex items-center text-sm text-orange-500 border border-orange-500 px-2 py-1 rounded space-x-2 hover:text-white hover:bg-orange-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Bloquer</span>
                  </button>
              </form> 

               <form 
                method="POST" 
                action="{{route('admin.activer.signal',$signal->communaute)}}"
              >
                @csrf
                  @method('PATCH')
                  <button type="submit" class="flex items-center text-sm text-green-500 border border-green-500 px-2 py-1 rounded space-x-2 hover:text-white hover:bg-green-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Activer</span>
                  </button>
              </form> 
      
              <form 
                action="{{route('admin.destroy.signal',$signal)}}"
                method="POST"
                onsubmit ="return confirm('Etres vous sur d\'annuler ce signal?');"
              >
                @csrf
                @method('DELETE')
                  <button type="submit" class="flex items-center text-sm text-blue-500 border border-blue-500 px-2 py-1 rounded space-x-2 hover:text-white hover:bg-blue-500">
                    <span>RAS</span>
                  </button>
              </form>

               <form 
                action="{{route('admin.supprimer.communaute',$signal->communaute)}}"
                method="POST"
                onsubmit ="return confirm('Etres vous sur de vouloir supprimer cette Page?');"
              >
                @csrf
                @method('DELETE')
                  <button type="submit" class="flex items-center text-sm text-red-500 border border-red-500 px-2 py-1 rounded space-x-2 hover:text-white hover:bg-red-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    <span>Supprimer page</span>
                  </button>
              </form>
            </div>
          </div>

        @else
          <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Aucun signal disponible pour</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
    </section>
  </main>

@endsection