@component('mail::message')
# Bonjour!

 <p>{{$text}}</p>
@component('mail::button', ['url' => config('app.url'), 'color' => 'success'])
Accueil
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
