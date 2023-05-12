<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @livewireStyles
        @vite('resources/css/app.css')
    </head>
    <body dir="rtl">
        @include('parts.header')
        <div class="mx-auto max-w-2xl px-6 lg:max-w-7xl py-4">
            @yield('content')
        </div>
        @include('parts.socials')
        @livewireScripts
    </body>
</html>
