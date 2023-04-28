<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="/assets/bootstrap/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h1 class="mb-4 mt-5">@yield('page_name')</h1>
            @yield('body')
        </div>
        <link rel="stylesheet" href="/assets/bootstrap/dist/js/bootstrap.bundle.min.js">
        @component('js-functions')@endcomponent
        @yield('js')
    </body>
</html>
