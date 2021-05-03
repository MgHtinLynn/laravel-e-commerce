@if ($message = session()->get('success'))
    <app-flash-message :status="`success`" :message="`{{ $message }}`"></app-flash-message>
@endif

@if ($message = session()->get('error'))
    <app-flash-message :status="`danger`" :message="`{{ $message }}`"></app-flash-message>
@endif

@if ($message = session()->get('warning'))
    <app-flash-message :status="`warning`" :message="`{{ $message }}`"></app-flash-message>
@endif

@if ($message = session()->get('info'))
    <app-flash-message :status="`info`" :message="`{{ $message }}`"></app-flash-message>
@endif

