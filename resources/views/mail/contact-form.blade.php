@component('mail::message')
<h1>{{ $data['name'] }}</h1>
<strong>{{ $data['subject'] }}</strong>
<p>{{ $data['message'] }}</p>
@endcomponent
