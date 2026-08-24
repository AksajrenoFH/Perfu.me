@if (request('drawer'))
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tambah Ulasan Baru</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-[#F8F9FA] antialiased">

        @include('reviews.form-create')

    </body>

    </html>
@else
    <x-app-layout>

        @include('reviews.form-create')

    </x-app-layout>
@endif
