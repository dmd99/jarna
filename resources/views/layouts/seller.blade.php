<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/admin/script.js') }}" defer></script>
    <title>@yield('title', 'Application') </title>
</head>

<body>
    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        @include('includes.admin.nav')
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">
                                    @yield('header', 'Application')
                                    {{--$title ?? 'Application'--}}
                                </h1>
                            </div>
                            <!-- Actions -->
                            @yield('actions')
                           
                        </div>
                        <!-- Nav -->
                        @yield('nav')
                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
