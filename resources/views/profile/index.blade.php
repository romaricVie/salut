<x-app-layout>
  <x-slot name="title">{!!$user->name.' '.$user->firstname!!}</x-slot>

  <section
    x-data="{ ...placeSubmenu(), activeTab: 'about' }"
    x-cloak
    class="w-full pb-8 relative"
  >
    <section class="w-full bg-white shadow md:pt-10" id="compte">
      <section class="max-w-3xl mx-auto">
        <div class="w-full h-64 mb-10 bg-gray-100 rounded-xl relative">
          <!-- cover-photo -->
          <a href="{{$user->profile_photo_url }}" aria-label="Photo de couverture de {{$user->name}}">
            <img 
              src="{{$user->profile_photo_url }}" 
              alt="Photo de couverture de {{$user->name}}"
              class="w-full h-full object-center object-scale-down rounded-xl"
            >
          </a>

          <div class="w-24 h-24 rounded-full bg-red-400 border-4 border-white absolute bottom-0 transform -translate-x-1/2 translate-y-12 profile_pic md:w-40 md:h-40">
            <a href="{{$user->profile_photo_url }}" aria-label="Photo de profil de {{$user->name}}">
              <img 
                src="{{$user->profile_photo_url }}" 
                alt="Photo de profil de {{$user->name}}"
                class="w-full h-full rounded-full object-center object-cover"
              >
            </a>
          </div>
        </div>
        <div class="w-full py-4 px-2">
          <p class="text-center text-base font-bold text-gray-900 sm:text-lg lg:text-2xl xl:text-4xl">{{$user->name.' '.$user->firstname}}</p>
          <p class="text-center text-xs font-light text-red-700 sm:text-sm sm:font-semibold md:text-base">Membre depuis {{$user->start_at}}</p>
        </div>
      </section>
      <section 
        class="w-full max-w-3xl bg-white flex items-center justify-between mx-auto pt-2 px-2 border-gray-500 border-t md:pt-4"
        @scroll.window="setAtTop"
        @resize.window="setAtTop"
        :class="{
                  'max-w-full fixed at__top px-6 xl:px-16 z-10' : atTop,
                  'xl__at__top' : (window.outerWidth >= 1280  && atTop),
                  'lg__at__top' : (window.outerWidth >= 1024 && 1280 > window.outerWidth && atTop),
                  'sm__at__top' : (window.outerWidth >= 640 && 1024 > window.outerWidth && atTop),
                  'xs__at__top' : (640 > window.outerWidth && atTop)
                }"  
      >
        <ul class="w-full flex items-center text-md font-semibold text-gray-700 z-10">
            <li 
              class="p-2 rounded-t hover:text-red-600 cursor-pointer text-sm sm:p-3 lg:text-base"
              @click="activeTab = 'about'"
              :class="{ 'text-red-600 bg-red-200' : activeTab === 'about' }"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block sm:hidden" viewBox="0 0 24 24" fill="currentColor"><circle fill="none" cx="12" cy="7" r="3"></circle><path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z"></path></svg>
              <span class="hidden sm:inline-block" :class="{ 'text-sm' : atTop }">À propos</span>
            </li>
            <li 
              class="p-2 rounded-t hover:text-red-600 cursor-pointer text-sm sm:p-3 lg:text-base"
              @click="activeTab = 'publications'"
              :class="{ 'text-red-600 bg-red-200' : activeTab === 'publications' }"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block sm:hidden" viewBox="0 0 24 24" fill="currentColor"><path transform="rotate(45.001 19.345 4.656)" d="M17.223 3.039H21.466V6.273H17.223z"></path><path d="M8 16L11 16 18.287 8.713 15.287 5.713 8 13z"></path><path d="M19,19H8.158c-0.026,0-0.053,0.01-0.079,0.01c-0.033,0-0.066-0.009-0.1-0.01H5V5h6.847l2-2H5C3.897,3,3,3.896,3,5v14 c0,1.104,0.897,2,2,2h14c1.104,0,2-0.896,2-2v-8.668l-2,2V19z"></path></svg>
              <span class="hidden sm:inline-block" :class="{ 'text-sm' : atTop }">Publications</span>
            </li>
            <li 
              class="p-2 rounded-t hover:text-red-600 cursor-pointer text-sm sm:p-3 lg:text-base"
              @click="activeTab = 'testimonials'"
              :class="{ 'text-red-600 bg-red-200' : activeTab === 'testimonials' }"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block sm:hidden" aria-hidden="true" focusable="false" role="img" viewBox="0 0 24 24" fill="currentColor"><path d="M20.664 3.478L8 8v7l.748.267-1.127 2.254c-.26.519-.281 1.123-.06 1.659.223.536.665.949 1.216 1.133l4.084 1.361c.205.068.416.101.624.101.741 0 1.451-.414 1.797-1.104l1.303-2.606 4.079 1.457c.65.233 1.336-.25 1.336-.941V4.419C22 3.728 21.314 3.245 20.664 3.478zM13.493 19.777L9.41 18.416l1.235-2.471 4.042 1.444L13.493 19.777zM4 15h2V8H4c-1.103 0-2 .897-2 2v3C2 14.103 2.897 15 4 15z"></path></svg>
              <span class="hidden sm:inline-block" :class="{ 'text-sm' : atTop }">Témoignages</span>
            </li>
            <li 
              class="p-2 rounded-t hover:text-red-600 cursor-pointer text-sm sm:p-3 lg:text-base"
              @click="activeTab = 'enseignement'"
              :class="{ 'text-red-600 bg-red-200' : activeTab === 'enseignement' }"
            >
              <svg class="w-5 h-5 inline-block sm:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
              </svg>
              <span class="hidden sm:inline-block" :class="{ 'text-sm' : atTop }">Enseignements</span>
            </li>
            <li 
              class="p-2 rounded-t hover:text-red-600 cursor-pointer text-sm sm:p-3 lg:text-base"
              @click="activeTab = 'events'"
              :class="{ 'text-red-600 bg-red-200' : activeTab === 'events' }"
            >
              <svg class="w-5 h-5 inline-block sm:hidden" aria-hidden="true" focusable="false" data-prefix="far" data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path></svg>
              <span class="hidden sm:inline-block" :class="{ 'text-sm' : atTop }">Evènements</span>
            </li>
        </ul>

        @if(auth()->user()->id === $user->id)
        <a 
          href="{{route('profile.show') }}" 
          class="rounded bg-red-700 text-white whitespace-no-wrap p-2 text-sm lg:p-3 lg:text-base"
        >
          <svg class="w-5 h-5 inline-block sm:hidden" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"></path></svg>
          <span class="hidden sm:inline-block" :class="{ 'text-sm' : atTop }">Modifier mon profil</span>          
        </a>
      @endif
      </section>
    </section>

    <section class="max-w-3xl mx-auto pt-4 px-2 text-gray-800">

      <!-- A PROOS -->
      <article 
        x-show="activeTab === 'about'"
        x-cloak
        class=" mx-auto bg-white rounded p-4 md:w-auto"
      >
        <div class="flex items-start font-semibold mb-3 text-sm sm:text-base">
          <h2 class="flex items-center">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" aria-hidden="true" focusable="false" data-prefix="far" data-icon="flag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M336.174 80c-49.132 0-93.305-32-161.913-32-31.301 0-58.303 6.482-80.721 15.168a48.04 48.04 0 0 0 2.142-20.727C93.067 19.575 74.167 1.594 51.201.104 23.242-1.71 0 20.431 0 48c0 17.764 9.657 33.262 24 41.562V496c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-83.443C109.869 395.28 143.259 384 199.826 384c49.132 0 93.305 32 161.913 32 58.479 0 101.972-22.617 128.548-39.981C503.846 367.161 512 352.051 512 335.855V95.937c0-34.459-35.264-57.768-66.904-44.117C409.193 67.309 371.641 80 336.174 80zM464 336c-21.783 15.412-60.824 32-102.261 32-59.945 0-102.002-32-161.913-32-43.361 0-96.379 9.403-127.826 24V128c21.784-15.412 60.824-32 102.261-32 59.945 0 102.002 32 161.913 32 43.271 0 96.32-17.366 127.826-32v240z"></path></svg>
            <span class="mr-4">Pays :</span>
          </h2>
          <span class="font-bold">{{$user->country ?? 'Non défini'}}</span>
        </div>
        <div class="flex items-start font-semibold mb-3 text-sm sm:text-base">
          <h2 class="flex items-center">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="briefcase" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"></path></svg>
            <span class="mr-4">Fonction: </span>
          </h2>
          <span class="font-bold">{{$user->job ?? 'Non défini'}}</span>
        </div>
        <div class="flex items-start font-semibold mb-3 text-sm sm:text-base">
          <h2 class="flex items-center">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book-open" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M542.22 32.05c-54.8 3.11-163.72 14.43-230.96 55.59-4.64 2.84-7.27 7.89-7.27 13.17v363.87c0 11.55 12.63 18.85 23.28 13.49 69.18-34.82 169.23-44.32 218.7-46.92 16.89-.89 30.02-14.43 30.02-30.66V62.75c.01-17.71-15.35-31.74-33.77-30.7zM264.73 87.64C197.5 46.48 88.58 35.17 33.78 32.05 15.36 31.01 0 45.04 0 62.75V400.6c0 16.24 13.13 29.78 30.02 30.66 49.49 2.6 149.59 12.11 218.77 46.95 10.62 5.35 23.21-1.94 23.21-13.46V100.63c0-5.29-2.62-10.14-7.27-12.99z"></path></svg>
            <span class="mr-4">Publications approuvées: </span>
          </h2>
          <p class="font-bold">{{$postactifs->count()}}</p>
        </div>

        @if(auth()->user()->id === $user->id && $postInactifs->count()>0)
        <div class="flex items-start font-semibold mb-3 text-sm sm:text-base">
          <h2 class="flex items-center">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book-open" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M542.22 32.05c-54.8 3.11-163.72 14.43-230.96 55.59-4.64 2.84-7.27 7.89-7.27 13.17v363.87c0 11.55 12.63 18.85 23.28 13.49 69.18-34.82 169.23-44.32 218.7-46.92 16.89-.89 30.02-14.43 30.02-30.66V62.75c.01-17.71-15.35-31.74-33.77-30.7zM264.73 87.64C197.5 46.48 88.58 35.17 33.78 32.05 15.36 31.01 0 45.04 0 62.75V400.6c0 16.24 13.13 29.78 30.02 30.66 49.49 2.6 149.59 12.11 218.77 46.95 10.62 5.35 23.21-1.94 23.21-13.46V100.63c0-5.29-2.62-10.14-7.27-12.99z"></path></svg>
            <a href="{{route('post.shows')}}" class="mr-4">Publications en attente: </a>
          </h2>
          <p class="font-bold">{{$postInactifs->count()}}</p>
        </div>
        @endif

        <article class="mb-4">
          <h2 class="flex items-center font-semibold mb-2 text-sm sm:text-base">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"></path></svg>
            <span>Verset préféré</span>
          </h2>
          <div class="w-full flex items-start bg-gray-200 rounded p-4 font-bold text-sm sm:text-base">
            @if($user->prefere)
            <p class="w-full">{{$user->prefere->text}}</p>
            <p class="flex-shrink-0 ml-2 font-semibold">{{$user->prefere->book.''.$user->prefere->chapter.':'.$user->prefere->verse}}</p>
            @else
            <p class="w-full">Non défini</p>
            @endif
          </div>
        </article>

        <article class="mb-4">
          <h2 class="flex items-center font-semibold mb-2 text-sm sm:text-base">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" aria-hidden="true" focusable="false" data-prefix="far" data-icon="address-book" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M436 160c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-20V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h320c26.5 0 48-21.5 48-48v-48h20c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-20v-64h20c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-20v-64h20zm-68 304H48V48h320v416zM208 256c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm-89.6 128h179.2c12.4 0 22.4-8.6 22.4-19.2v-19.2c0-31.8-30.1-57.6-67.2-57.6-10.8 0-18.7 8-44.8 8-26.9 0-33.4-8-44.8-8-37.1 0-67.2 25.8-67.2 57.6v19.2c0 10.6 10 19.2 22.4 19.2z"></path></svg>
            <span>Biographie</span>
          </h2>
          <div class="w-full flex items-start bg-gray-200 rounded p-4 font-bold text-sm sm:text-base">
            @if($user->bio)
            <p class="bg-gray-200 rounded p-4 font-bold text-sm sm:text-base"><?=nl2br($user->bio)?></p>
            @else
            <p class="w-full">Non défini</p>
            @endif
          </div>
        </article>

        <!--User communauty -->
        @if($user->communaute)
         <div class="flex items-start font-semibold mb-3 text-sm sm:text-base">
          <h2 class="flex items-center">
           
           <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
            <span class="mr-4">Page: </span>
          </h2>
            <a href="{{route('communaute.show',$user->communaute)}}">{{$user->communaute->name}}</a>
        </div>
        @endif

        <!--User site web -->
        <div class="flex items-start font-semibold mb-3 text-sm sm:text-base">
          <h2 class="flex items-center">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" role="img" fill="currentColor"><path d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.514,2,12,2z M4,12c0-0.899,0.156-1.762,0.431-2.569L6,11l2,2 v2l2,2l1,1v1.931C7.061,19.436,4,16.072,4,12z M18.33,16.873C17.677,16.347,16.687,16,16,16v-1c0-1.104-0.896-2-2-2h-4v-2v-1 c1.104,0,2-0.896,2-2V7h1c1.104,0,2-0.896,2-2V4.589C17.928,5.778,20,8.65,20,12C20,13.835,19.373,15.522,18.33,16.873z"></path></svg>
            <span class="mr-4">Site internet: </span>
          </h2>
          <span class="font-bold">{{$user->web ?? 'Non défini'}}</span>
        </div>
      </article>

      <!-- PUBLICATIONS -->
      <article 
        x-show="activeTab === 'publications'"
        x-cloak
        class="flex flex-col items-center md:items-start md:flex-row"
      >
        @if(auth()->user()->id === $user->id)
          <form 
            method="POST" 
            action="{{route('post.store')}}" 
            enctype="multipart/form-data" 
            id="image-upload-preview"
            class="w-full max-w-xl mb-3 px-3 md:mr-2 post__form md:w-auto" 
            :class="{ 'md:sticky at__top' : atTop }"
          >
            @csrf
            @include('partials/_form',['textButton' =>'Publier'])
          </form>
        @endif

        <section class="w-full">
          @if($posts->count() > 0)
            @foreach($posts as $post)
              <livewire:like-post :post="$post"/>
            @endforeach
             @elseif(auth()->user()->id === $user->id)
               <p class="max-w-xl w-4/5 mx-auto bg-white rounded p-3 sm:w-auto">Vous n'avez fait aucune publication.</p>
            @else
               <p class="max-w-xl w-4/5 mx-auto bg-white rounded p-3 sm:w-auto"> <span class="font-semibold">{{$user->name}}</span> n'a fait aucune publication.</p>
         @endif
        </section>
      </article>


      <!-- TEMOIGNAGES -->
      <article 
        x-show="activeTab === 'testimonials'"
        x-cloak
        class="flex flex-col items-center md:items-start md:flex-row"
      >
        <section class="w-full">
          @if($temoignages->count() > 0)
            @foreach($temoignages as $temoignage)
              <livewire:temoignage :temoignage="$temoignage"/>
            @endforeach
            @elseif(auth()->user()->id === $user->id)
               <p class="max-w-xl w-11/12 mx-auto bg-white rounded p-3 sm:w-auto">Vous n'avez  partagé aucun témoignage.</p>
             @else
               <p class="max-w-xl w-11/12 mx-auto bg-white rounded p-3 sm:w-auto"><span class="font-semibold">{{$user->name}}</span> n'a partagé aucun témoignage.</p>
          @endif
        </section>
      </article>


      <!-- Evenements -->
      <article 
        x-show="activeTab === 'events'"
        x-cloak
        class="flex flex-col items-center md:items-start md:flex-row"
      >
        <section class="w-full">
          @if($events->count() > 0)
             @foreach($events as $event)
              <livewire:event :event="$event"/>
            @endforeach
           @elseif(auth()->user()->id === $user->id)
              <p class="max-w-xl w-11/12 mx-auto bg-white rounded p-3 sm:w-auto">Vous n'avez publié aucun évènement.</p>
           @else
             <p class="max-w-xl w-11/12 mx-auto bg-white rounded p-3 sm:w-auto"><span class="font-semibold">{{$user->name}}</span>  n'a publié aucun évènement.</p>
         @endif
        </section>
      </article>


   <!-- enseignement -->
     <article 
        x-show="activeTab === 'enseignement'"
        x-cloak
        class="flex flex-col items-center md:items-start md:flex-row"
      >
        <section class="w-full">
          @if($enseignements->count() > 0)
             @foreach($enseignements as $enseignement)
               <livewire:enseignement :enseignement="$enseignement"/>
            @endforeach
             @elseif(auth()->user()->id === $user->id)
                 <p class="max-w-xl w-11/12 mx-auto bg-white rounded p-3 sm:w-auto">Vous n'a publié aucun enseignement.</p>
              @else
               <p class="max-w-xl w-11/12 mx-auto bg-white rounded p-3 sm:w-auto"><span class="font-semibold">{{$user->name}}</span>  n'a publié aucun enseignement.</p>
          @endif
        </section>
      </article>
    </section>

  </section>

  <!-- SCRIPT -->
  <script type="text/javascript">
    function placeSubmenu() {
      return {
        atTop: false,
        setAtTop: function() {
          // Pour les écrans >= 1024
          if( window.outerWidth >= 1024 ) {
            this.atTop = (window.pageYOffset > 512) ? true : false
          }
          // Pour les 768 <= écrans < 1024
          if( window.outerWidth >= 768 && window.outerWidth < 1024 ) {
            this.atTop = (window.pageYOffset > 500) ? true : false
          }
          // Pour les écrans < 768
          if( window.outerWidth < 768 ) {
            this.atTop = (window.pageYOffset > 450) ? true : false
          }
        }
      }
    }
  </script>
</x-app-layout>


