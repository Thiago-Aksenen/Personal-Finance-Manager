<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title }}</title>
</head>

<body>

    <x-header :title="$title" />

    <div class="d-flex" style="min-height: 100vh;">

        <x-sidebar />

        <main class="flex-grow-1 p-4">
            {{ $slot }}
        </main>

    </div>

</body>

</html>