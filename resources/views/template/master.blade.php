<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <!-- Appel du head -->
  @include('template/partials/_header')

  <!-- Body -->
  <body>
    <div class="min-h-screen w-full bg-white flex items-start">

      <!-- NAVIGATION -->
      <div 
        x-data="{}"
        class="h-screen w-auto py-4 sticky top-0 flex-shrink-0 flex overflow-y-hidden" style="background-color: #11142b;"
      >
        <button 
          class="focus:outline-none w-6 h-6 rounded-full bg-blue-500 grid place-items-center text-gray-100 absolute left-4 top-0 transform translate-y-2 z-10"
        >
          <span title="Réduire le menu" class="">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path></svg>
          </span>
          <span title="agrandir le menu" class="hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
          </span>
        </button>

        @include('template/partials/_nav')
      </div>

      <!-- PAGE PRINCIPALE -->
      <div class="w-full min-h-screen bg-gray-200 overflow-x-hidden">
        <!-- LES ALERTS -->
          @if(count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
          @endif

          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{session('success')}}!</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          @if(session('danger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>{{session('danger')}}!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
        <!-- FIN ALERTS -->

        
        <!-- CONTENU PRINCIPAL -->
        @yield('content')
        <!-- FIN CONTENU PRINCIPAL -->
      </div>
      <!-- FIN PAGE PRINCIPALE -->
      
    </div>
    

    <!-- Scripts -->
    @include('template/partials/_footer')
    @yield('extra-js')
</body>
</html>