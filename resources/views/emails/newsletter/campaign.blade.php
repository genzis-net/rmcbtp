@component('mail::message')

Mr/Mme {{ $data['client_lname'] }}, 

<hr>

{!! $data['content'] !!}

@endcomponent
