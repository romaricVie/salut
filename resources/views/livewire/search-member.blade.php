
<div 
  x-data="{ isTyping: false, isFocused: false, isActive: false }"
  x-cloak
  class="w-8 h-8 rounded-full bg-white sm:bg-gray-200 grid place-items-center lg:w-auto lg:h-auto lg:rounded-none lg:bg-white lg:block ml-4 relative"
>
  <button 
    class="block lg:hidden text-gray-600 focus:outline-none"
    @click="isActive = true; $nextTick(() => {$refs.search_member.focus();});"
  >
      <svg class="w-5 h-5" fill="currentColor" height="96px" id="magnifying_glass" version="1.1" viewBox="0 0 96 96" width="96px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M90.63,84.971l-22.5-22.5C73.05,56.311,76,48.5,76,40C76,20.12,59.88,4,40,4S4,20.12,4,40  s16.12,36,36,36c8.5,0,16.311-2.95,22.471-7.87l22.5,22.5c0.779,0.78,1.812,1.17,2.829,1.17c1.021,0,2.05-0.39,2.83-1.17  C92.189,89.07,92.189,86.529,90.63,84.971z M40,68c-15.464,0-28-12.536-28-28s12.536-28,28-28s28,12.536,28,28S55.464,68,40,68z" id="_x3C_Path_x3E_"/></svg>
  </button>
  <div 
    class="hidden lg:block top-0 left-0 z-40"
    :class="{ 
              'sm__searchbar absolute shadow-lg' : isActive && window.innerWidth >= 640,
              'xs__searchbar fixed bg-white w-screen h-screen pb-4 overflow-y-auto z-50' : isActive && window.innerWidth < 640,
            }"
    @click.away="isActive = false"
  >
      <div 
          class="relative"
      >
          <!-- Search bar -->
          <div 
            class="w-full sm:w-64 px-1 overflow-hidden border border-transparent sm:rounded-md flex items-center"
            :class="{
                      'rounded-b-none border-gray-300 bg-white' : isTyping,
                      'bg-gray-200' : !isTyping && window.innerWidth >= 640,
                      'border-gray-300 bg-white' : window.innerWidth < 640,
                    }"
          >
            <button 
              class="sm:hidden text-gray-500 mr-2 focus:outline-none"
              @click="isActive = false"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
              </svg>
            </button>
            <label for="search" class="hidden sm:block text-gray-500 mr-1 flex-shrink-0 flex items-center select-none cursor-text">
              <svg class="w-5 h-5" fill="currentColor" height="96px" id="magnifying_glass" version="1.1" viewBox="0 0 96 96" width="96px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M90.63,84.971l-22.5-22.5C73.05,56.311,76,48.5,76,40C76,20.12,59.88,4,40,4S4,20.12,4,40  s16.12,36,36,36c8.5,0,16.311-2.95,22.471-7.87l22.5,22.5c0.779,0.78,1.812,1.17,2.829,1.17c1.021,0,2.05-0.39,2.83-1.17  C92.189,89.07,92.189,86.529,90.63,84.971z M40,68c-15.464,0-28-12.536-28-28s12.536-28,28-28s28,12.536,28,28S55.464,68,40,68z" id="_x3C_Path_x3E_"/></svg>
            </label>
            <input 
              type="text"
              wire:model="query"
              value="{{$query}}"
              placeholder="Rechercher Utilisateur..."
              @keyup="isTyping = ($event.target.value != '') ? true : false"
              @focusin="isFocused = true"
              @focusout="isFocused = false"
              x-ref="search_member"
              class="w-full bg-transparent text-sm text-gray-600 py-2 focus:outline-none placeholder-black"
            >
          </div>

          <!-- Search result -->
          @if(strlen($this->query)>0)
            <div 
                class="absolute left-0 w-full bg-white sm:border px-2 sm:px-1 py-2 sm:rounded-b-md z-30 overflow-y-auto"
                id="search__results" 
            >
                @if(count($members)>0)
                  @foreach($members as $member)
                    <a href="{{route('profil.index',$member)}}" class="flex items-center p-1 mb-1 rounded border bg-white hover:bg-gray-300">
                        <img 
                            src="{{$member->profile_photo_url}}" 
                            alt="..."
                            class="w-8 h-8 mr-2 rounded-full border object-center object-cover flex-shrink-0"
                        >
                        <span class="w-full text-gray-700 font-semibold truncate">{{$member->name.' '.$member->firstname}}</span>
                    </a>
                  @endforeach
                @else
                  <p class="p-1 text-gray-600">Aucun résultat pour <span class="font-bold text-gray-800">"{{$query}}"</span></p>
                @endif
            </div>
          @endif
      </div>
  </div>
</div>

