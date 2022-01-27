@component('mail::message')
    # {{ $details['title'] }}
    {{ $details['body'] }}
@component('mail::button',['url'=>$details['link'], 'color'=>'error'])
    Lihat pesanan!
@endcomponent
    Thanks,<br>
    Library CN
@endcomponent