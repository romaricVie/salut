<x-app-layout>
  <x-slot name="title">
          Aide
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nous avons besoin d\'aide') }}
        </h2>
    </x-slot>
    <div class="text-center">
  	     <p class="text-xl text-gray-700 font-bold mt-4">Pour le bon fonctionnement de cette plateforme nous avons besoin:</p>
    </div>
     <div class="flex flex-row justify-center">
           <div class="px-2 py-2 w-64 h-auto m-2 rounded border border-green-600 bg-green-200">
              <p class="text-xl font-semibold">Besoins matériels</p>
			     <ul class="list-disc list-inside">
					  <li>Local</li>
					  <li>Odinateurs</li>
					  <li>Equipements audios visuelles</li>
					  <li>Abonnement Internet</li>
					  <li>Voiture</li>  
			     </ul>
          </div>
          <div class="px-2 py-2 w-64 h-auto m-2 rounded border border-green-600 bg-green-200">
             <p class="text-xl font-semibold">Besoins humains</p>
		     <ul class="list-disc list-inside">
				  <li>Développeurs d'application web et mobile</li>
				  <li>Administrateurs</li>
				  <li>Moderateurs</li>  
		      </ul>  
          </div>
      </div> 
      <div class="max-w-screen-md mx-auto p-4 mt-2 shadow-sm hover:shadow-md rounded border-2 border-4 bg-white">
        <p class="mb-5 text-lg">Pour toutes personnes souhaitant nous aider, veuillez nous contacter par email à l'adresse:  <a href="mailto:administration@affranchie.com">administration@affranchie.com</a>
          </p>  
       </div>
</x-app-layout>
