@if(request('drawer'))
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Produk Baru</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#F8F9FA] antialiased">
        @include('products.form-create')
    </body>
    </html>
@else
    <x-app-layout>
        @include('products.form-create')
    </x-app-layout>
@endif