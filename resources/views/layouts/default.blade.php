<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>

<body>
    <div id="app">
        @include('includes.app.entete')
        @include('includes.app.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @if (session('logedInStatus'))
    <div id="toast" class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div class="jr-toast position-relative">
            <img class="close-ison" src="/images/icons/x-circle.svg" alt="">
            <div class="d-flex align-items-center gap-3">
                <div class="success-icon">
                    <img class="" width="32px" height="32px" class="" src="/images/icons/checkmark.svg" alt="">
                </div>
                {{session('logedInStatus')}}
            </div>
        </div>
    </div>
    <script>
        var toast = document.getElementById('toast');
        setTimeout(() => {
            toast.classList.add('opacity0');
            setTimeout(() => {
                toast.classList.add('d-none');
            }, 300);
        }, 2000);
    </script>
    @endif
</body>

</html>
