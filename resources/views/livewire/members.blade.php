<div>
	 <section 
        x-data="placeSubmenu()"
        x-cloak
        class="pt-2 pb-4 px-1 sm:pt-4 sm:pb-0 sm:px-4"
        id="members" 
    >
        <section 
            class="max-w-screen-xl mx-auto rounded p-2 bg-white flex items-center justify-between md:p-3"
            @scroll.window="setAtTop"
            @resize.window="setAtTop"
            :class="{
                      'max-w-full fixed at__top px-1 sm:px-3' : atTop,
                      'xl__at__top shadow' : (window.outerWidth >= 1280  && atTop),
                      'lg__at__top shadow' : (window.outerWidth >= 1024 && 1280 > window.outerWidth && atTop),
                      'sm__at__top shadow' : (window.outerWidth >= 640 && 1024 > window.outerWidth && atTop),
                      'xs__at__top shadow' : (640 > window.outerWidth && atTop)
                    }"
        >
            <h1 class="text-sm text-red-700 font-semibold ml-1 sm:ml-0 sm:text-base lg:text-lg">Membres <span class="hidden sm:inline">de la communauté</span></h1>

          
        </section>

        <section class="max-w-screen-xl mx-auto grid grid-cols-1 gap-1 pt-6 pb-1 mt-2 sm:grid-cols-2 sm:gap-3 md:px-4 md:grid-cols-3 xl:grid-cols-4" :class="{ 'mt-20' : atTop }">

            @foreach($members as $member)
                <div class="bg-white p-2 rounded shadow hover:bg-gray-100 sm:p-3">
                    <a 
                        href="{{route('profil.index',$member)}}"
                        class="w-full flex items-center sm:block"
                    >
                        <img 
                            src="{{$member->profile_photo_url}}" 
                            aria-label="Photo de profil de {{$member->firstname}}" 
                            class="w-10 h-10 mr-2 flex-shrink-0 rounded-full object-center object-cover sm:w-16 sm:h-16 sm:mx-auto sm:rounded-full sm:mb-2 md:w-20 md:h-20"
                        />
                        <div class="w-full text-gray-800 truncate sm:text-center">
                            <h3 class="text-sm font-bold lg:text-base truncate">{{$member->name.' '.$member->firstname}}</h3>
                            <h4 class="text-xs font-semibold lg:text-sm">membre depuis le {{$member->start_at}}</h4>
                        </div>
                    </a>
                </div>
            @endforeach
        </section>
        <div>
        	{{$members->links()}}
        </div>
    </section>


</div>
