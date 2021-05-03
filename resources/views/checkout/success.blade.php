@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <checkout-success inline-template :url="`{{ route('home') }}`" :url_transactions="`{{ route('checkout-store') }}`">
            <div>Hello</div>
        </checkout-success>
    </div>
@endsection
