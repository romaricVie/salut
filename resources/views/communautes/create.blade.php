<x-app-layout>
  <x-slot name="title">Creer une Page pour votre communaute</x-slot>

  <section 
    x-data="{ isFocused: false }" 
    x-cloak
    class="px-3 py-8 grid place-items-center text-gray-600"
  >


    <form method="POST" action="{{route('communaute.store')}}" enctype="multipart/form-data" id="image-upload-preview" class="max-w-md bg-white px-3 py-5 rounded-md">
      @csrf

       <article class="max-w-screen-md mx-auto mb-4 flex items-start rounded px-3 py-2 text-lg font-bold bg-blue-500 text-gray-100 mb-6">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1 flex-shrink-0"><path d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.514,2,12,2z M12,20c-4.411,0-8-3.589-8-8s3.589-8,8-8 s8,3.589,8,8S16.411,20,12,20z"></path><path d="M11 11H13V17H11zM11 7H13V9H11z"></path></svg>
      <div>
        Créer une Page pour partager des informations avec votre communaute.
        <br/>
      </div>
    </article>

      @include('partials/_formCreateCommunaute',['textButton' =>'Créer Page'])
    </form>
</x-app-layout>




