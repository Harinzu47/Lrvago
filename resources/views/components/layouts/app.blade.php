<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="LarvaGo menyediakan layanan penjualan maggot BSF berkualitas tinggi dengan pengelolaan limbah organik yang efisien. Temukan solusi tepat untuk kebutuhan maggot Anda di sini!">
    <meta name="keywords" content="maggot BSF, penjualan maggot, pengelolaan limbah organik, LarvaGo, solusi ramah lingkungan, pupuk organik}">
    <meta name="author" content="LarvaGo">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <title>{{ $title ?? 'LarvaGo' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles()
</head>
<body class="bg-slate-200 dark:bg-slate-700 flex flex-col min-h-screen">
    @livewire('partials.navbar')
    <main class="flex-grow">
        {{ $slot }}
    </main>
    @livewire('partials.footer')
    @livewireScripts()

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</body>
</html>