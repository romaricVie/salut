@component('mail::message')
<ul>
	<li>{{$name.' '.$firstname}}</li>
	<li>{{$email}}</li>
	<li>{{$phone}}</li>
</ul>
<p>{{$message}}</p>

@component('mail::button', ['url' => config('app.url'), 'color' => 'success'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
