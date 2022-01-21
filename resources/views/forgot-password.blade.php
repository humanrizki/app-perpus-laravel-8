@component('mail::message')
    # {{ $details['title'] }}
    {{ $details['body'] }}
@component('mail::button',['url'=>$details['link']])
    Reset Password!
@endcomponent
    Thanks,<br>
    Library CN
@endcomponent