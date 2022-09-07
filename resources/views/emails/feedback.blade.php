@component('mail::message')
    #
    Email: {{ $email }}

    Phone: {{ $phone }}

    Title: {{ $title }}

    Content: {{ $content }}



    Thanks,

    {{ config('app.name') }}
@endcomponent
