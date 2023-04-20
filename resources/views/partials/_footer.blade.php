<footer 
    id="footer" 
    class="w-full text-gray-600 text-sm bg-gray-100"
>
    <div class="flex items-center justify-center flex-wrap space-x-4 px-3 py-6">
        <div class="w-full flex justify-center mb-2 sm:w-auto sm:mb-0"><img src="{{asset('/images/logo.svg')}}" alt="logo affranchie" class="w-auto h-20"></div>
        <a class="hover:underline" href="{{route('dashboard')}}">Accueil</a>
        <a class="hover:underline" href="#">Visite guidée</a>
        <a class="hover:underline" href="{{route('contacts.index')}}">Nous Contacter</a>
        <a class="hover:underline" href="{{route('us')}}">&Agrave; propos</a>
        <a href="{{route('charte')}}" class="hover:underline">Charte d'utilisation</a>
        <a class="hover:underline" href="#">Youtube</a>
        <a class="hover:underline" href="#">facebook</a>
        <a class="hover:underline" href="#">Instagram</a>
        <a class="hover:underline" href="#">Twitter</a>
        <a class="hover:underline" href="#">Linkedin</a>
    </div>

    <div class="bg-gray-200 p-4">
        <p class="text-sm text-center">&copy; {{date('Y')}}  <img src="{{asset('/images/logo-texte.svg')}}" alt="logo affranchie" class="w-auto h-10 inline-block">
        </p>
    </div>
</footer>
    
                                    