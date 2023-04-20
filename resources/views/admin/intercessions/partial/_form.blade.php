
   <div class="row">
       <div class="col-md-6">
        <div class="form-group">
           <label for="display_at" class="col-form-label">{{ __('Publier le(aaaa-mm-dd 00:00:00)') }}</label>
               <input name="display_at" id="display_at" type="texte" class="form-control @error('display_at') is-invalid @enderror"  value="{{ old('display_at') ?? $intercession->display_at}}"   autocomplete="display_at" autofocus placeholder="0000-00-00 00:00:00" required>
                    @error('display_at')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
               </div>  
          </div>
   </div>
   <div class="row">
       <div class="col-md-6">
               <textarea cols="5" rows="5" placeholder="Entrer  Sujet de Prière ..." name="subject" class="form-control @error('subject') is-invalid @enderror" required>{{old('subject')?? $intercession->subject}}</textarea>
               @error('subject')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span>
                @enderror
          </div>
   </div>
   <div>
      <div class="col-md-6">
           <div class="mt-2">
                  <button type="submit" class="inline-flex items-center bg-red-600 text-white hover:text-white rounded-sm px-4 py-2"><svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                     </svg>{{$text}}</button>  
            </div>
       </div>
   </div>
   