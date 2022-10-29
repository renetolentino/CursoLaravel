<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão App - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}" type="text/css">
    </head>
    <body>
        @include('app.layouts._partials.topo')
        @yield('conteudo')
    </body>
</html>