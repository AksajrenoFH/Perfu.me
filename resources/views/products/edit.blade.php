@if(request('drawer'))
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Produk</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#F8F9FA] antialiased">
        @include('products.form-edit')
    </body>
    </html>
@else
    <x-app-layout>
        @include('products.form-edit')
    </x-app-layout>
@endif