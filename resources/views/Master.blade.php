<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('header_libraries')
    <title>Document</title>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    @yield('footer_scripts')

    @yield('custom_scripts')
</body>
</html>