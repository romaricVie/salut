<div class="row">
   <div class="col-md-6">
             <div class="form-group">
               <label for="display_at" class="col-form-label">{{ __('Publier le(aaaa-mm-dd 00:00:00)') }}</label>
               <input name="display_at" id="display_at" type="text" class="form-control @error('display_at') is-invalid @enderror"  value="{{ old('display_at') ?? $verset->display_at }}" required autocomplete="display_at" autofocus placeholder="&#x23f2; 0000-00-00 00:00:00">
                    @error('display_at')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
               </div>  
            </div>
            <div class="col-md-6">
                  <div class="form-group">
                     <label for="book" class="col-form-label">{{ __('Livre') }}</label>
                     <select class="form-control" id="book" name="book" required>
                       <option value="">Livres...</option>
                       @foreach($books as $book)
                       <option value="{{$book->name}}"  {{$book->name ?  'selected' : '' }}>{{$book->name}}</option>
                      @endforeach
                  </select>
                  @error('book')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                   </div> 
            </div>
</div>
<div class="row">
        <div class="col-md-6">
           <div class="form-group">
               <label for="chapter" class="col-form-label">{{ __('Chapitre') }}</label>
               <input name="chapter" id="chapter" type="text"  class="form-control @error('chapter') is-invalid @enderror"  value="{{ old('chapter') ?? $verset->chapter }}"   autocomplete="chapter" autofocus required>
                    @error('chapter')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
               </div>
          </div>
           <div class="col-md-6">
             <div class="form-group">
               <label for="verse" class="col-form-label">{{ __('Verset') }}</label>
               <input name="verse" id="verse" type="text" class="form-control @error('verse') is-invalid @enderror"  value="{{ old('verse') ?? $verset->verse }}"   autocomplete="verse" autofocus required>
                    @error('verse')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
               </div>  
         </div>
    </div>
<div class="row">
        <div class="col-md-6">
             <textarea cols="5" rows="5" placeholder="Entrer text ..."name="text" class="form-control @error('text') is-invalid @enderror" required >{{old('text')?? $verset->text}}</textarea >
                    @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
       </div>
 </div>
<div class="col-md-6">
      <div class="mt-2">
         <button type="submit" class="inline-flex items-center bg-red-600 text-white hover:text-white rounded-sm px-4 py-2"><svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                  </svg>{{$text}}</button>   
      </div>
</div>