@component('mail::message')
Hi {{ $customer->first_name }} {{ $customer->last_name }}

{!! $message->message !!}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
