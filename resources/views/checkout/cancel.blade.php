@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <checkout-cancel inline-template>
            <div>
                <app-flash-message :status="`danger`"
                                   :message="`Payment Cancel! Please Try Again`"></app-flash-message>

                <a href="{{ route('home') }}" class="btn btn-md btn-primary px-4 py-2 rounded-pill">Back To Home</a>
            </div>
        </checkout-cancel>
    </div>
@endsection
