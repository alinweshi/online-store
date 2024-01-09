<!-- resources/views/mails/mymail.blade.php -->

@component('mail::message')
hello dears:
This is my first email using Laravel.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/online-store'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
