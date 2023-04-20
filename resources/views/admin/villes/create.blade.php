@extends('template.master',['title'=>'Creer point relais'])

@section('content')
  <main class="px-10 pt-10 pb-6">

    <div class="flex space-x-5 items-center mb-10">
      <a href="{{route('admin.index.villes')}}" class="flex-shrink-0 flex items-center text-blue-600 text-xs uppercase m-0">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        <span>Retour</span>
      </a>
      <h1 class="text-xl font-extrabold text-gray-700">Créer un point relais pour les dons en nature</h1>
    </div>

    <section class="bg-white p-4 rounded-md">
      <form method="POST" action="{{route('admin.store.villes')}}">
        @csrf
        <div class="row">
          <div class="col-md-6">
             <label for="name">Entrer le point relais(Pays - Ville(non-point-relais))</label>
             <input type="text" id="name" name="name" placeholder="Côte-d'Ivoire-Guiglo(Eglise_CMA)" class="form-control form-control @error('name') is-invalid @enderror" value="{{old('name')?? old('name')}}" required><br>
             @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
          <div class="col-md-6">
             <label for="responsable">Nom du reponsable</label>
              <input type="text" id="responsable" name="responsable" class="form-control  form-control @error('responsable') is-invalid @enderror" value="{{old('responsable')?? old('responsable')}}" required><br>
               @error('responsable')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
        </div>

             <div class="row">
              <div class="col-md-6">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" class="form-control form-control @error('email') is-invalid @enderror" required>
                 @error('email')
                    <p class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></p>
                  @enderror
              </div>
              <div class="col-md-6">
                <label for="phone">Téléphone</label>
                <input type="tel" id="phone" name="phone" class="form-control  form-control @error('phone') is-invalid @enderror" value="{{old('phone')?? old('phone')}}" required>
                  @error('phone')
                    <p class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></p>
                  @enderror
              </div>
            </div>
            <div class="mt-3">
              <button type="submit" class="inline-flex items-center bg-red-600 text-white hover:text-white rounded-sm px-4 py-2">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                <span class="font-semibold text-sm">Créer</span>
              </button>  
            </div>
          </div>
        </form>
  
    </section>
  </main>

@endsection