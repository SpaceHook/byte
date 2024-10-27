<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $seoText->meta_title ?? 'Byte' }}</title>
    <meta name="description" content="{{ $seoText->meta_description ?? '' }}">
    <meta name="keywords" content="{{ $seoText->meta_keywords ?? '' }}">
    <link rel="icon" type="image/png" href="/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
    <body>
        <header class="header">
            @include('header')
        </header>

        @yield('content')

        <footer class="footer">
            @include('footer')
        </footer>

        @include('modal')
    </body>
</html>
