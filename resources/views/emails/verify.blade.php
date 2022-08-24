@component('mail::message')
    #
    Your OTP is {{ $otp }}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
