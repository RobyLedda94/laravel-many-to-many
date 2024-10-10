<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    @include('partials.header')
    <main>
        <h1 class="text-center mt-5">Questa è la tua homepage</h1>
        <!-- @yield('content') -->
    </main>
</body>
</html>
