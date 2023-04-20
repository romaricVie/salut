<x-app-layout>
    <x-slot name="title">Membres de la Communauté</x-slot>

   <!--Members-->
   @livewire('members')

    <!-- SCRIPT -->
    <script type="text/javascript">
        function placeSubmenu() {
            return {
                atTop: false,
                setAtTop: function() {
                    // Pour les écrans >= 768 
                    if( window.outerWidth >= 768 && window.outerWidth < 1024 ) {
                        this.atTop = (window.pageYOffset > 80) ? true : false
                    }
                    // Pour les écrans < 768
                    if( window.outerWidth < 768 ) {
                        this.atTop = (window.pageYOffset > 60) ? true : false
                    }
                }
            }
        }
    </script>
</x-app-layout>
