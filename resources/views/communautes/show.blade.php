<x-app-layout>
  <x-slot name="title">{!!$communaute->name!!}</x-slot>

  <section
    x-data="{ ...placeSubmenu(), activeTab: 'about' }"
    x-cloak
    class="w-full pb-8 relative"
  >
    <section class="w-full bg-white shadow md:pt-10" id="compte">
      <section class="max-w-3xl mx-auto">
        <div class="w-full h-64 mb-10 bg-gray-100 rounded-xl relative">
          <!-- cover-photo -->
          <a href="{{asset('storage/'.$communaute->image)}}" aria-label="Photo de couverture de {{$communaute->name}}">
            <img 
              src="{{asset('storage/'.$communaute->image)}}" 
              alt="Photo de couverture de {{$communaute->name}}"
              class="w-full h-full object-center object-scale-down rounded-xl"
            >
          </a>

          <div class="w-24 h-24 rounded-full bg-red-400 border-4 border-white absolute bottom-0 transform -translate-x-1/2 translate-y-12 profile_pic md:w-40 md:h-40">
            <a href="{{asset('storage/'.$communaute->image)}}" aria-label="Photo de profil de {{$communaute->name}}">
              <img 
                src="{{asset('storage/'.$communaute->image)}}" 
                alt="Photo de profil de {{$communaute->name}}"
                class="w-full h-full rounded-full object-center object-cover"
              >
            </a>
          </div>
        </div>
        <div class="w-full py-4 px-2">
          <p class="text-center text-base font-bold text-gray-900 sm:text-lg lg:text-2xl xl:text-4xl">{{$communaute->name}}</p>
          <p class="text-center text-xs font-light text-red-700 sm:text-sm sm:font-semibold md:text-base">créée depuis {{$communaute->start_at}}</p>
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
           
        </ul>

        @if(auth()->user()->id === $communaute->user->id)
        <a 
          href="{{route('communaute.edit',$communaute)}}"
          class="rounded bg-blue-700 text-white whitespace-no-wrap p-2 text-sm lg:p-3 lg:text-base"
        >
          <svg class="w-5 h-5 inline-block sm:hidden" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"></path></svg>
          <span class="hidden sm:inline-block" :class="{ 'text-sm' : atTop }">Editer</span>          
        </a>
        @else
          <a 
          href="{{route('signal.create',$communaute)}}"
          class="rounded bg-red-700 text-white whitespace-no-wrap p-2 text-sm lg:p-3 lg:text-base"
        >
          <svg class="w-5 h-5 inline-block sm:hidden" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"></path></svg>
          <span class="hidden sm:inline-block" :class="{ 'text-sm' : atTop }">Signaler</span>          
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
            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            <span class="mr-4">Auteur :</span>
          </h2>
          <span class="font-bold">{{$communaute->user->name.' '.$communaute->user->firstname}}</span>
        </div>
        <div class="flex items-start font-semibold mb-3 text-sm sm:text-base">
          <h2 class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" aria-hidden="true" focusable="false" role="img" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M20,4H6C4.897,4,4,4.897,4,6v5h2V8l6.4,4.8c0.178,0.133,0.389,0.2,0.6,0.2s0.422-0.067,0.6-0.2L20,8v9h-8v2h8 c1.103,0,2-0.897,2-2V6C22,4.897,21.103,4,20,4z M13,10.75L6.666,6h12.668L13,10.75z"></path><path d="M2 12H9V14H2zM4 15H10V17H4zM7 18H11V20H7z"></path></svg>
            <span class="mr-4">Email: </span>
          </h2>
          <span class="font-bold">{{$communaute->user->email}}</span>
        </div>
         <div class="flex items-start font-semibold mb-3 text-sm sm:text-base">
          <h2 class="flex items-center">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
            <span class="mr-4">Phone: </span>
          </h2>
          <span class="font-bold">{{$communaute->user->phone}}</span>
        </div>

        <div class="flex items-start font-semibold mb-3 text-sm sm:text-base">
          <h2 class="flex items-center">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book-open" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M542.22 32.05c-54.8 3.11-163.72 14.43-230.96 55.59-4.64 2.84-7.27 7.89-7.27 13.17v363.87c0 11.55 12.63 18.85 23.28 13.49 69.18-34.82 169.23-44.32 218.7-46.92 16.89-.89 30.02-14.43 30.02-30.66V62.75c.01-17.71-15.35-31.74-33.77-30.7zM264.73 87.64C197.5 46.48 88.58 35.17 33.78 32.05 15.36 31.01 0 45.04 0 62.75V400.6c0 16.24 13.13 29.78 30.02 30.66 49.49 2.6 149.59 12.11 218.77 46.95 10.62 5.35 23.21-1.94 23.21-13.46V100.63c0-5.29-2.62-10.14-7.27-12.99z"></path></svg>
            <span class="mr-4">Publications: </span>
          </h2>
          <p class="font-bold">{{$publications->count()}}</p>
        </div>

        <article class="mb-4">
          <h2 class="flex items-center font-semibold mb-2 text-sm sm:text-base">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" aria-hidden="true" focusable="false" data-prefix="far" data-icon="address-book" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M436 160c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-20V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h320c26.5 0 48-21.5 48-48v-48h20c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-20v-64h20c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-20v-64h20zm-68 304H48V48h320v416zM208 256c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm-89.6 128h179.2c12.4 0 22.4-8.6 22.4-19.2v-19.2c0-31.8-30.1-57.6-67.2-57.6-10.8 0-18.7 8-44.8 8-26.9 0-33.4-8-44.8-8-37.1 0-67.2 25.8-67.2 57.6v19.2c0 10.6 10 19.2 22.4 19.2z"></path></svg>
            <span>Description Page</span>
          </h2>
          <div class="w-full flex items-start bg-gray-200 rounded p-4 font-bold text-sm sm:text-base">

            <p class="bg-gray-200 rounded p-4 font-bold text-sm sm:text-base"><?=nl2br($communaute->description)?></p>
           
          </div>
        </article>
      </article>

      <!-- PUBLICATIONS -->
      <article 
        x-show="activeTab === 'publications'"
        x-cloak
        class="flex flex-col items-center md:items-start md:flex-row"
      >
        @if(auth()->user()->id === $communaute->user->id)
          <form 
            method="POST" 
            action="{{route('publication.store',$communaute)}}" 
            enctype="multipart/form-data" 
            id="image-upload-preview"
            class="w-full max-w-xl mb-3 px-3 md:mr-2 post__form md:w-auto" 
            :class="{ 'md:sticky at__top' : atTop }"
          >
            @csrf
            @include('partials/_form',['textButton' =>'Publier'])
          </form>
        @endif


        <!-- publications livewire-->
          <section class="w-full">
              @if($publications->count() > 0)
                @foreach($publications as $publication)
                  <livewire:like-publication :publication="$publication"/>
            @endforeach
           @else
               <p class="max-w-xl w-4/5 mx-auto bg-white rounded p-3 sm:w-auto"> <span class="font-semibold">{{$communaute->user->name}}</span> n'a fait aucune publication.</p>
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


