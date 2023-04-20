<div class="">
  <x-jet-validation-errors class="mb-4" />
  <div
    x-data="{ isFocused: false, text: '' }" 
    x-cloak
    class="w-full text-gray-600 bg-gray-300 rounded overflow-hidden md:w-64"
  >
    <section 
      class=" px-2 py-3"
      :class="{'bg-white' : isFocused || text !== ''}" 
    >
      <textarea 
          id="message"
          name="message" 
          rows="7"
          required
          placeholder="Dites quelque chose à la communauté !"
          class="w-full block resize-none px-1 outline-none bg-transparent text-gray-700"
          @focusin="isFocused = true"
          @focusout="isFocused = false"
          x-model="text"
      >{{old('message')?? old('message')}}</textarea>

      <!-- Preview -->
      <div 
        class="hidden place-items-center w-full rounded border overflow-y-auto bg-transparent" 
        id="preview"
      >
        <img 
          id="preview-image" 
          class="max-w-full h-auto object-center" 
          src=""
          alt="" 
        />
      </div>
      
    </section>

    <section 
      class="flex items-stretch justify-between px-2 pb-3 pt-1 text-xs"
      :class="{'bg-white' : isFocused || text !== ''}"
    >
      <button
        class="flex-shrink-0 grid place-items-center px-1 rounded mr-2 bg-gray-200 hover:bg-gray-400 hover:text-gray-700"
        @click.prevent="$refs.fileInput.click()"
      >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
      </button>

      <input 
        id="image" 
        name="image"
        type="file"
        accept="image/*" 
        class="hidden"
        x-ref="fileInput"
      >

      <button 
        type="submit" 
        class="w-full text-center bg-red-600 py-2 px-5 rounded text-xs text-white font-semibold hover:bg-red-700 focus:bg-red-700"
      >
        <span>{{$textButton}}</span>
      </button>
    </section>
  </div>
</div>

<!--Upload Image with Preview-->
  <script type="text/javascript">
    
    const inputFile = document.querySelector('#image');
    const preview = document.querySelector('#preview');
    const previewImage = document.querySelector('#preview-image');

    inputFile.addEventListener('change', function() {
      let file = this.files[0];
      if (file) {
        let reader = new FileReader();
        reader.onloadend = function() {
          previewImage.setAttribute('src', reader.result);
          previewImage.setAttribute('alt', file.name);
          preview.style.display = "grid";
        }
        reader.readAsDataURL(file);
      } else {
        previewImage.setAttribute('src', '');
        previewImage.setAttribute('alt', '');
        preview.style.display = "none";
      }
    }, false);

  </script>