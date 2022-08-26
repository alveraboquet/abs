@component('mail::message')
    #
    Your OTP is {{ $otp }}

    Thanks,

    {{ config('app.name') }}
@endcomponent
