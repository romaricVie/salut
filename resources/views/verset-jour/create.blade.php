<x-app-layout>
  <x-slot name="title">Verset-prefere</x-slot>
  <x-jet-validation-errors class="mb-4" />
  <section 
    class="max-w-screen-md mx-auto px-3 py-6 grid place-items-center text-gray-600"
  >

    <h1 class="text-center text-gray-800 font-bold mb-10 text-lg md:text-xl">Mon verset préféré</h1>

    <form 
      method="POST"
      action="{{route('verset.store')}}"
      x-data="{ isFocused: false }" 
      x-cloak 
      class="w-full max-w-lg grid sm:grid-cols-3 gap-2"
    >
      @csrf

      <div class="w-full mb-4 sm:col-span-1">
        <x-jet-label for="book" value="{{ __('Choisir livre *') }}" />
        <select  
          id="book" 
          name="book" 
          required
          class="w-full border border-transparent outline-none text-sm p-2 rounded-md mt-1 bg-white focus:bg-gray-300 focus:border-red-400"
        >
          <option value="">Livres...</option>
          @foreach($books as $book)
            <option value="{{$book->name}}">{{$book->name}}</option>
          @endforeach
        </select>
      </div>

      
      <!--chapitre field-->
      <div class="w-full mb-4 sm:col-span-1">
        <x-jet-label for="chapter" value="{{ __('Chapitre *') }}" />
        <input 
          id="chapter" 
          class="w-full border border-transparent outline-none text-sm p-2 rounded-md mt-1 bg-white focus:bg-gray-300 focus:border-red-400" 
          type="number" 
          min="1"
          name="chapter"  
          aria-placeholder="Entrer chapitre" 
          required 
        />
      </div>

      <!--verset field-->
      <div class="w-full mb-4 sm:col-span-1">
        <x-jet-label for="verse" value="{{ __('Verset *') }}" />
        <input 
          id="verse" 
          class="w-full border border-transparent outline-none text-sm p-2 rounded-md mt-1 bg-white focus:bg-gray-300 focus:border-red-400" 
          type="number" 
          min="1"
          name="verse" 
          aria-placeholder="Entrer verset" 
          required 
          autocomplete="verse" 
        />
      </div>

      <div class="w-full mb-4 sm:col-span-3">
        <x-jet-label for="text" value="{{ __('Texte du verset*') }}" />
        <div 
          class="rounded-md border-transparent mt-1 overflow-hidden"
          :class="{ 'border border-red-400' : isFocused }"
        >
          <textarea
            id="text"
            name="text"
            class="w-full block resize-none rounded-md shadow-none bg-white font-haireline text-sm px-3 py-2 outline-none focus:bg-gray-300 "
            rows="6"
            aria-placeholder="Entrez votre sujet"
            @focusin="isFocused = true"
            @focusout="isFocused = false"
            required
          >{{old('text')?? old('text')}}</textarea>
        </div>
      </div>
       

      <button 
        type="submit" 
        class="sm:col-span-3 place-self-center mt-6 bg-red-600 py-2 px-5 rounded-md text-sm text-white font-semibold hover:bg-red-700 focus:bg-red-700"
      >{{ __('Enregistrer') }}</button>
    </form>
  </section>
</x-app-layout>
