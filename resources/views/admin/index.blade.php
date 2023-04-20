@extends('template.master',['title'=>'Administration'])
 @section('content')
 
 <main class="px-10 pt-10 pb-6">
    <h1 class="text-xl font-extrabold text-gray-700 mb-10">Bienvenue sur la page d'administration</h1>
    <section class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-5 gap-2 md:gap-4">
      <div class="border bg-white rounded-md p-4 flex flex-col-reverse items-center">
        <h4 class="truncate text-base text-gray-500 m-0">Enseignements</h4>
        <p class="text-3xl font-bold text-gray-600 uppercase m-0">{{$enseignements->count()}}</p>
        <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
        </svg>
      </div>

      <div class="border bg-white rounded p-4 flex flex-col-reverse items-center">
        <h4 class="truncate text-base text-gray-500 m-0">Publications</h4>
        <p class="text-3xl font-bold text-gray-600 uppercase m-0">{{$publications->count()}}</p>
        <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
        </svg>
        </svg>
      </div>

      <div class="border bg-white rounded p-4 flex flex-col-reverse items-center">
        <h4 class="truncate text-base text-gray-500 m-0">Evènements</h4>
        <p class="text-3xl font-bold text-gray-600 uppercase m-0">{{$evenements->count()}}</p>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-500" viewBox="0 0 24 24" fill="currentColor">
          <path d="M7 11H9V13H7zM7 15H9V17H7zM11 11H13V13H11zM11 15H13V17H11zM15 11H17V13H15zM15 15H17V17H15z"></path><path d="M5,22h14c1.103,0,2-0.897,2-2V8V6c0-1.103-0.897-2-2-2h-2V2h-2v2H9V2H7v2H5C3.897,4,3,4.897,3,6v2v12 C3,21.103,3.897,22,5,22z M19,8l0.001,12H5V8H19z"></path>
        </svg>
      </div>

      <div class="border bg-white rounded p-4 flex flex-col-reverse items-center">
        <h4 class="truncate text-base text-gray-500 m-0">Témoignages</h4>
        <p class="text-3xl font-bold text-gray-600 uppercase m-0">{{$temoignages->count()}}</p>
        <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
        </svg>
      </div>

      <div class="border bg-white rounded p-4 flex flex-col-reverse items-center">
        <h4 class="truncate text-base text-gray-500 m-0">Utilisateurs</h4>
        <p class="text-3xl font-bold text-gray-600 uppercase m-0">{{$users->count()}}</p>
        <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
        </svg>
      </div>

      <div class="border bg-white rounded p-4 flex flex-col-reverse items-center">
        <h4 class="truncate text-base text-gray-500 m-0">Messages</h4>
        <p class="text-3xl font-bold text-gray-600 uppercase m-0">{{$messages->count()}}</p>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-500" aria-hidden="true" focusable="false" role="img" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
          <path d="M20,4H6C4.897,4,4,4.897,4,6v5h2V8l6.4,4.8c0.178,0.133,0.389,0.2,0.6,0.2s0.422-0.067,0.6-0.2L20,8v9h-8v2h8 c1.103,0,2-0.897,2-2V6C22,4.897,21.103,4,20,4z M13,10.75L6.666,6h12.668L13,10.75z"></path><path d="M2 12H9V14H2zM4 15H10V17H4zM7 18H11V20H7z"></path>
        </svg>
      </div>

      <div class="border bg-white rounded p-4 flex flex-col-reverse items-center">
        <h4 class="truncate text-base text-gray-500 m-0">Demandes de prière</h4>
        <p class="text-3xl font-bold text-gray-600 uppercase m-0">{{$prieres->count()}}</p>
        <svg class="w-6 h-6 text-gray-500" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="praying-hands" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
          <path fill="currentColor" d="M272 191.91c-17.6 0-32 14.4-32 32v80c0 8.84-7.16 16-16 16s-16-7.16-16-16v-76.55c0-17.39 4.72-34.47 13.69-49.39l77.75-129.59c9.09-15.16 4.19-34.81-10.97-43.91-14.45-8.67-32.72-4.3-42.3 9.21-.2.23-.62.21-.79.48l-117.26 175.9C117.56 205.9 112 224.31 112 243.29v80.23l-90.12 30.04A31.974 31.974 0 0 0 0 383.91v96c0 10.82 8.52 32 32 32 2.69 0 5.41-.34 8.06-1.03l179.19-46.62C269.16 449.99 304 403.8 304 351.91v-128c0-17.6-14.4-32-32-32zm346.12 161.73L528 323.6v-80.23c0-18.98-5.56-37.39-16.12-53.23L394.62 14.25c-.18-.27-.59-.24-.79-.48-9.58-13.51-27.85-17.88-42.3-9.21-15.16 9.09-20.06 28.75-10.97 43.91l77.75 129.59c8.97 14.92 13.69 32 13.69 49.39V304c0 8.84-7.16 16-16 16s-16-7.16-16-16v-80c0-17.6-14.4-32-32-32s-32 14.4-32 32v128c0 51.89 34.84 98.08 84.75 112.34l179.19 46.62c2.66.69 5.38 1.03 8.06 1.03 23.48 0 32-21.18 32-32v-96c0-13.77-8.81-25.99-21.88-30.35z"></path>
        </svg>
      </div>

      <div class="border bg-white rounded p-4 flex flex-col-reverse items-center">
        <h4 class="truncate text-base text-gray-500 m-0">Points relais</h4>
        <p class="text-3xl font-bold text-gray-600 uppercase m-0">{{$villes->count()}}</p>
        <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
          </svg>
      </div>

      <div class="border bg-white rounded p-4 flex flex-col-reverse items-center">
        <h4 class="truncate text-base text-gray-500 m-0">Nouveaux convertis</h4>
        <p class="text-3xl font-bold text-gray-600 uppercase m-0">{{$convertis->count()}}</p>
        <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
      </div>

      <div class="border bg-white rounded p-4 flex flex-col-reverse items-center">
        <h4 class="truncate text-base text-gray-500 m-0">Dons</h4>
        <p class="text-3xl font-bold text-gray-600 uppercase m-0 space-x-1">
          <span>{{$dons->count()}}</span>
          <span class="text-xl font-light">&#x7C;</span>
          <span class="text-green-500">{{$donations->count()}}</span>
        </p>
        <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
        </svg>
      </div>

       <div class="border bg-white rounded p-4 flex flex-col-reverse items-center">
        <h4 class="truncate text-base text-gray-500 m-0">Pages</h4>
        <p class="text-3xl font-bold text-gray-600 uppercase m-0 space-x-1">
          <span>{{$pages->count()}}</span>
        </p>
         <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
      </div>
    </section>
 </main>
@endsection