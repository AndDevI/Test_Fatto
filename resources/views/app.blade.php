<!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        @vite('resources/css/app.css')
        
        <title>Teste Fatto</title>
    </head>
    <body class="bg-gray-100 font-sans leading-normal tracking-normal">
        <div class="container mx-auto">
            @yield('content')
        </div>
    </body>
</html>