@extends('template.master',['title'=>'Nouveau-converti'])

@section('content')
  <main class="px-10 pt-10 pb-6">

    <div class="flex space-x-5 items-center mb-10">
      <a href="{{route('admin.index.convertis')}}" class="flex-shrink-0 flex items-center text-blue-600 text-xs uppercase m-0">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        <span>Retour</span>
      </a>
      <h1 class="text-xl font-extrabold text-gray-700">Nouveau convertir</h1>
    </div>

    <div class="w-full bg-white mx-auto py-2 overflow-hidden border-b-2 border-gray-300 sm:mb-2 sm:border-none sm:shadow sm:max-w-xl sm:rounded-md relative">
      <section class="w-full flex items-start px-2 mb-3">
                <a href="{{route('profil.index',$user)}}" class="mr-3" title="Photo de profil de {{$user->name.' '.$user->firstname}}">
                    <img 
                        src="{{$user->profile_photo_url}}" 
                        alt=""
                        class="w-8 h-8 rounded-full border object-center object-cover sm:w-10 sm:h-10"
                    >
                </a>
                <div>
                    <a href="{{route('profil.index',$user)}}" class="inline-block font-semibold text-gray-800 text-sm lg:text-lg">{{$user->name.' '.$user->firstname}}</a>
                    <p class="timeago text-xs font-semibold">{{$user->convertir->created_at}}</p>
                </div>
            </section>
               <!-- Article Body -->
            <section class="w-full text-sm pt-1 lg:text-base">
                  <!-- text -->
                  <p class="mb-4 px-3"><?=replace_links(nl2br($user->convertir->motivation))?></p>

                  <!-- Post images -->
                  @if($user->convertir->image)
                  <div class="">
                      <a href="{{asset('storage/'.$user->convertir->image)}}" class="w-full block">
                          <img 
                              src="{{asset('storage/'.$user->convertir->image)}}" 
                              alt="{{$user->name}}"
                              class="w-full h-auto"
                          >
                      </a>
                  </div>
                  @endif
              </section>
       </div>
       
       <!--Table-->
       <section class="bg-white p-2 rounded-md max-w-xl mx-auto">
          <div class="overflow-x-auto w-full">
                <table class="w-full table" id="table">
                  <thead class="bg-gray-200 text-gray-800">
                    <tr class="text-xs">
                      <th scope="col">id</th>
                      <th scope="col">Pays</th>
                      <th scope="col">Ville</th>
                      <th scope="col">Habitation</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr class="text-sm text-gray-600">
                          <td class="whitespace-no-wrap">{{$user->id}}</td>
                          <td class="whitespace-no-wrap">{{$user->convertir->pays}}</td>
                          <td class="whitespace-no-wrap">{{$user->convertir->ville}}</td>
                          <td class="whitespace-no-wrap">{{$user->convertir->habitation}}</td>
                          <td class="whitespace-no-wrap"><a href="mailto:{{$user->convertir->email}}">{{$user->convertir->email}}</a></td>
                          <td class="whitespace-no-wrap">{{$user->convertir->phone}}</td>
                      </tr>
                  </tbody>
                </table>
              </div>
        </section>
</main>









<!-- 
 <div>
    <h1 class="text-center">Nouveau-converti </h1>
     <div class="max-w-screen-md mx-auto px-3 py-5 mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-300">
            <div class="mb-8">
                <a href="{{route('profil.index',$user)}}" class="no-underline hover:no-underline focus:outline-none font-bold uppercase">{{$user->name.' '.$user->firstname}}
                </a><i> publié le {{$user->convertir->created_at}}</i>
                 <img src="{{$user->profile_photo_url}}" title="Photo de profil de {{$user->firstname}}" class="h-20 w-20">
            </div>
           <div>
           <p class="text-base font-semibold break-all"><?=replace_links(nl2br($user->convertir->motivation))?>
           </p>
             @if($user->convertir->image)
                 <div class="mb-8">
                  <a href="{{asset('storage/'.$user->convertir->image)}}"><img src="{{asset('storage/'.$user->convertir->image)}}" title="{{$user->name}}"></a>
                 </div>
                @endif 
            </div>
            <div>
            <div>
      </div>
      </div>
   </div>
</div>
<div class="table-responsive mt-5 mb-2">
            <table class="table">
             <thead class="thead-dark">
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Pays</th>
                  <th scope="col">Ville</th>
                  <th scope="col">Habitation</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  
                 </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->convertir->pays}}</td>
                    <td>{{$user->convertir->ville}}</td>
                    <td>{{$user->convertir->habitation}}</td>
                    <td><a href="mailto:{{$user->convertir->email}}">{{$user->convertir->email}}</a></td>
                    <td>{{$user->convertir->phone}}</td>
                 </tr>
               </tbody>
            </table>
      </div>   -->
@endsection