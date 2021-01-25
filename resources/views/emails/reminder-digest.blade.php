@component('mail::message')
# Reminders to work on


@component('mail::table')
|Reminder|Lead Name|Phone|
|:-------|:--------|:----|
@foreach($reminders as $reminder)
|{{$reminder['reminder']}}|{{$reminder['lead']['name']}}|{{$reminder['lead']['phone']}}
@endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
