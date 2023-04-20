<x-app-layout>
  <x-slot name="title">A-propos</x-slot>
  <!--about-->
   @include('partials/_about')

      <!--footer-->
  @include('partials/_footerAuth')

  <!-- SCRIPTS -->
  <!-- Suppression les menu du haut et de gauche -->
  <script type="text/javascript" src="{{asset('/assets/js/removeMenus.js')}}"></script>

</x-app-layout>
