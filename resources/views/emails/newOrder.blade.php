@component('mail::message')
# New Order

Send someone a Order for you

@component('mail::button', ['url' => route('dashboard')])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
