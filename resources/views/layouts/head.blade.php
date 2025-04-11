<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Backend | Mendoza Law Firm</title>

    <link rel="icon" href="https://mendozafirm.com/wp-content/uploads/2022/12/cropped-the-mendoza-law-firm-cropped-logo-512-32x32.png" sizes="32x32" />
    <link rel="icon" href="https://mendozafirm.com/wp-content/uploads/2022/12/cropped-the-mendoza-law-firm-cropped-logo-512-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="https://mendozafirm.com/wp-content/uploads/2022/12/cropped-the-mendoza-law-firm-cropped-logo-512-180x180.png" />
    <meta name="msapplication-TileImage" content="https://mendozafirm.com/wp-content/uploads/2022/12/cropped-the-mendoza-law-firm-cropped-logo-512-270x270.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" /> --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @viteReactRefresh
    {{-- Fetch logged in user --}}
    <script>
        let globalData = {!! isset($globalData) ? $globalData->toJson() : null !!};
    </script>
    
</head>
