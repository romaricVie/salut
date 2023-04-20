<x-app-layout>
  <x-slot name="title">La Charte d'utilisation</x-slot>
  
    <!--charte-->
   @include('partials/_charte')

      <!--footer-->
  @include('partials/_footerAuth')
  <script type="text/javascript" src="{{asset('/assets/js/removeMenus.js')}}"></script>

</x-app-layout>
