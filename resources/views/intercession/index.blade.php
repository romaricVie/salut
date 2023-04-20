<x-app-layout>
  <x-slot name="title">Prière</x-slot>

  <section class="px-2 py-4">
    <article class="max-w-screen-md mx-auto mb-4 flex items-start rounded px-3 py-2 bg-blue-100 text-gray-900 mb-6">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1 flex-shrink-0"><path d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.514,2,12,2z M12,20c-4.411,0-8-3.589-8-8s3.589-8,8-8 s8,3.589,8,8S16.411,20,12,20z"></path><path d="M11 11H13V17H11zM11 7H13V9H11z"></path></svg>
      <div>
        <h3 class="font-semibold text-gray-600 text-xs sm:text-sm leading-tight">Si vous avez des sujets de prière générale, Veuillez contacter  le departement intercession à l'adresse ci-dessous: <br/> <a href="mailto:intercession@affranchie.com" class="hover:underline">intercession@affranchie.com</a></h3>
        <br/>
        <p class="font-semibold text-gray-600 text-xs sm:text-sm leading-tight">NB:Chaque trois(3) jours de nouveaux sujets de prière seront disponibles.</p>
      </div>
    </article>

    <div>
      <div class="max-w-screen-md mx-auto p-5 mb-3 shadow-sm hover:shadow-md rounded-md bg-white">
        <div>
          @if(isset($intercession))
            <p class="text-sm sm:text-base font-semibold text-gray-600"><?=nl2br($intercession->subject)?></p>
          @else
            <p class="text-sm sm:text-base font-semibold text-gray-600">Pas de sujet disponible !</p>
          @endif
        </div>
       </div>
    </div>
  </section>
    

</x-app-layout>
