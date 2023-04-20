
<nav class="h-full overflow-y-auto px-4 relative">

  <!-- Logos -->
  <div class="flex items-start justify-between space-x-4 mt-3 mb-8">
    <div>
      <a href="" class="text-lg text-bold text-gray-200 hover:text-gray-400 leading-none">Affranchie</a>
      <h5 class="uppercase leading-none text-red-600 font-bold tracking-widest navigation__title">Administration</h5>
    </div>

    <a href="{{route('dashboard')}}" title="www.affranchie.com" class="bg-red-500 hover:bg-red-600 text-white font-light flex items-center px-2 py-1 rounded">
      <span class="text-sm whitespace-no-wrap">Aller au site</span>
      <svg class="w-5 h-5 flex-shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
    </a>
  </div>


  <!-- Navigation -->
  <div>
    <h5 class="text-gray-400 font-bold tracking-widest uppercase mb-3 navigation__title">Navigation</h5>
    <ul>
      <li>
        <a href="{{route('admin.dashboard')}}" title="Tableau de bord" class="h-10 px-2 flex items-center text-gray-400 rounded-md menu__link {{set_active_route('admin.dashboard')}}">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path d="M4 13h6c.552 0 1-.447 1-1V4c0-.553-.448-1-1-1H4C3.448 3 3 3.447 3 4v8C3 12.553 3.448 13 4 13zM3 20c0 .553.448 1 1 1h6c.552 0 1-.447 1-1v-4c0-.553-.448-1-1-1H4c-.552 0-1 .447-1 1V20zM13 20c0 .553.447 1 1 1h6c.553 0 1-.447 1-1v-7c0-.553-.447-1-1-1h-6c-.553 0-1 .447-1 1V20zM14 10h6c.553 0 1-.447 1-1V4c0-.553-.447-1-1-1h-6c-.553 0-1 .447-1 1v5C13 9.553 13.447 10 14 10z"></path>
          </svg>
          <span class="text-sm ml-2">Tableau de bord</span>
        </a>
      </li>

      <li class="relative">
        <a href="{{route('admin.index.enseignements')}}" title="Enseignements" class="h-10 px-2 flex items-center text-gray-400 rounded-md menu__link {{set_active_route('admin.index.enseignements')}}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
          </svg>
          <span class="text-sm ml-2">Enseignements</span>
        </a>
        <!-- <span class="inline-block link__badge absolute text-white right-0 transform -translate-y-1/2 -translate-x-2 bg-orange-500 py-1 px-2 rounded font-semibold select-none tracking-widest">5000</span> -->
      </li>

      <li class="relative">
        <a href="{{route('admin.index.posts')}}" title="Publications" class="h-10 px-2 flex items-center text-gray-400 rounded-md menu__link {{set_active_route('admin.index.posts')}}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
          </svg>
          <span class="text-sm ml-2">Publications</span>
        </a>
        <!-- <span class="inline-block link__badge absolute text-white right-0 transform -translate-y-1/2 -translate-x-2 bg-orange-500 py-1 px-2 rounded font-semibold select-none tracking-widest">5000</span> -->
      </li>

      <li class="relative">
        <a href="{{route('admin.index.evenements')}}" title="Evènements" class="h-10 px-2 flex items-center text-gray-400 rounded-md menu__link {{set_active_route('admin.index.evenements')}}">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
            <path d="M7 11H9V13H7zM7 15H9V17H7zM11 11H13V13H11zM11 15H13V17H11zM15 11H17V13H15zM15 15H17V17H15z"></path><path d="M5,22h14c1.103,0,2-0.897,2-2V8V6c0-1.103-0.897-2-2-2h-2V2h-2v2H9V2H7v2H5C3.897,4,3,4.897,3,6v2v12 C3,21.103,3.897,22,5,22z M19,8l0.001,12H5V8H19z"></path>
          </svg>
          <span class="text-sm ml-2">Evènements</span>
        </a>
      </li>

      <li class="relative">
        <a href="{{route('admin.index.temoignages')}}" title="Témoignages" class="h-10 px-2 flex items-center text-gray-400 rounded-md menu__link {{set_active_route('admin.index.temoignages')}}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
          </svg>
          <span class="text-sm ml-2">Témoignages</span>
        </a>
      </li>

       <li class="relative">
        <a href="{{route('admin.index.signals')}}" title="Pages" class="h-10 px-2 flex items-center text-gray-400 rounded-md menu__link {{set_active_route('admin.index.signals')}}">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
          <span class="text-sm ml-2">Pages</span>
        </a>
      </li>

      @can('gestion-utilisateur')
        <li>
          <a href="{{route('admin.index')}}" title="Utilisateurs" class="h-10 px-2 flex items-center text-gray-400 rounded-md menu__link {{set_active_route('admin.index')}}">
            <svg class="w-5 h-5" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="users" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
              <path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path>
            </svg>
            </svg>
            <span class="text-sm ml-2">Utilisateurs</span>
          </a>
        </li>

        <li class="relative">
          <a href="{{route('admin.contact.index')}}" title="Messages" class="h-10 px-2 flex items-center text-gray-400 rounded-md menu__link {{set_active_route('admin.contact.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" aria-hidden="true" focusable="false" role="img" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
              <path d="M20,4H6C4.897,4,4,4.897,4,6v5h2V8l6.4,4.8c0.178,0.133,0.389,0.2,0.6,0.2s0.422-0.067,0.6-0.2L20,8v9h-8v2h8 c1.103,0,2-0.897,2-2V6C22,4.897,21.103,4,20,4z M13,10.75L6.666,6h12.668L13,10.75z"></path><path d="M2 12H9V14H2zM4 15H10V17H4zM7 18H11V20H7z"></path>
            </svg>
            <span class="text-sm ml-2">Messages</span>
          </a>
        </li>
      @endcan

      @can('super-admin')
        <li>
          <a href="{{route('admin.index.intercessions')}}" title="Contacts" class="h-10 px-2 flex items-center text-gray-400 rounded-md menu__link {{set_active_route('admin.index.intercessions')}}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path>
            </svg>
            <span class="text-sm ml-2">Intercessions</span>
          </a>
        </li>

        <li class="relative">
          <a href="{{route('admin.index.prieres')}}" title="Contacts" class="h-10 px-2 flex items-center text-gray-400 rounded-md menu__link {{set_active_route('admin.index.prieres')}}">
            <svg class="w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="praying-hands" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
              <path fill="currentColor" d="M272 191.91c-17.6 0-32 14.4-32 32v80c0 8.84-7.16 16-16 16s-16-7.16-16-16v-76.55c0-17.39 4.72-34.47 13.69-49.39l77.75-129.59c9.09-15.16 4.19-34.81-10.97-43.91-14.45-8.67-32.72-4.3-42.3 9.21-.2.23-.62.21-.79.48l-117.26 175.9C117.56 205.9 112 224.31 112 243.29v80.23l-90.12 30.04A31.974 31.974 0 0 0 0 383.91v96c0 10.82 8.52 32 32 32 2.69 0 5.41-.34 8.06-1.03l179.19-46.62C269.16 449.99 304 403.8 304 351.91v-128c0-17.6-14.4-32-32-32zm346.12 161.73L528 323.6v-80.23c0-18.98-5.56-37.39-16.12-53.23L394.62 14.25c-.18-.27-.59-.24-.79-.48-9.58-13.51-27.85-17.88-42.3-9.21-15.16 9.09-20.06 28.75-10.97 43.91l77.75 129.59c8.97 14.92 13.69 32 13.69 49.39V304c0 8.84-7.16 16-16 16s-16-7.16-16-16v-80c0-17.6-14.4-32-32-32s-32 14.4-32 32v128c0 51.89 34.84 98.08 84.75 112.34l179.19 46.62c2.66.69 5.38 1.03 8.06 1.03 23.48 0 32-21.18 32-32v-96c0-13.77-8.81-25.99-21.88-30.35z"></path>
            </svg>
            <span class="text-sm ml-2">Demandes de prière</span>
          </a>
        </li>

        <li>
          <a href="{{route('admin.index.versets')}}" title="Contacts" class="h-10 px-2 flex items-center text-gray-400 rounded-md menu__link {{set_active_route('admin.index.versets')}}">
            <svg class="w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bible" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <path fill="currentColor" d="M448 358.4V25.6c0-16-9.6-25.6-25.6-25.6H96C41.6 0 0 41.6 0 96v320c0 54.4 41.6 96 96 96h326.4c12.8 0 25.6-9.6 25.6-25.6v-16c0-6.4-3.2-12.8-9.6-19.2-3.2-16-3.2-60.8 0-73.6 6.4-3.2 9.6-9.6 9.6-19.2zM144 144c0-8.84 7.16-16 16-16h48V80c0-8.84 7.16-16 16-16h32c8.84 0 16 7.16 16 16v48h48c8.84 0 16 7.16 16 16v32c0 8.84-7.16 16-16 16h-48v112c0 8.84-7.16 16-16 16h-32c-8.84 0-16-7.16-16-16V192h-48c-8.84 0-16-7.16-16-16v-32zm236.8 304H96c-19.2 0-32-12.8-32-32s16-32 32-32h284.8v64z"></path>
            </svg>
            <span class="text-sm ml-2">Verset Biblique</span>
          </a>
        </li>

        <li>
          <a href="{{route('admin.index.villes')}}" title="Contacts" class="h-10 px-2 flex items-center text-gray-400 rounded-md menu__link {{set_active_route('admin.index.villes')}}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span class="text-sm ml-2">Point relais</span>
          </a>
        </li>

         <li class="relative">
          <a href="{{route('admin.index.convertis')}}" title="Contacts" class="h-10 px-2 flex items-center text-gray-400 rounded-md menu__link {{set_active_route('admin.index.convertis')}}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="text-sm ml-2">Nouveaux convertis</span>
          </a>
        </li>

        <li class="relative">
          <a href="{{route('admin.index.dons')}}" title="Contacts" class="h-10 px-2 flex items-center text-gray-400 rounded-md menu__link {{set_active_route('admin.index.dons')}}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
            <span class="text-sm ml-2">Dons enrégistrés</span>
          </a>
        </li>

         <li class="relative">
          <a href="{{route('admin.index.donation')}}" title="Contacts" class="h-10 px-2 flex items-center text-gray-400 rounded-md menu__link {{set_active_route('admin.index.donation')}}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
            </svg>
            <span class="text-sm ml-2">Dons réçus</span>
          </a>
        </li>
      @endcan
    </ul>
  </div>

  <footer>
    <p class="text-xs text-gray-300 font-bold">&copy; 2021 - Affranchie</p>
  </footer>
</nav>
