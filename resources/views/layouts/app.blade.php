<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-Commerce') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <app-layout inline-template>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('icons/logo/logo.png') }}" width="70" height="70" alt="Wave Money Logo"
                         class="logo mr-2">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <?php $superAdminRole = config('e-shop.super-admin-role') ?>
                        @hasrole($superAdminRole)
                        <li class="nav-item nav-menu mr-3">
                            <a class="nav-link" href="{{ route('transaction-list.index') }}">Transactions</a>
                        </li>

                        <li class="nav-item nav-menu mr-3">
                            <a class="nav-link" href="{{ route('customer-list.index') }}">Customers</a>
                        </li>

                        <li class="nav-item nav-menu">
                            <a class="nav-link" href="{{ route('item-list.index') }}">Items</a>
                        </li>
                        @endhasrole
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Account
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if( auth()->user()->verified_at !== null)
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            Profile
                                        </a>

                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                        <li class="ml-mini-cart ml-3" v-cloak>
                            <add-to-cart inline-template>
                                <a href="{{ route('add-to-cart') }}">
                                    <span class="fas fa-cart-plus"></span>
                                    <span class="total-count">@{{ count }}</span>
                                </a>
                            </add-to-cart>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </app-layout>
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
