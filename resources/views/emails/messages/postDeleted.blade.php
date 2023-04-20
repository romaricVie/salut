@component('mail::message')
# Votre post a été supprimé!

   <p>{{$texte}}</p>

@component('mail::button', ['url' => config('app.url'), 'color' => 'success'])
Accueil
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
