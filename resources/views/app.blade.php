<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('build/assets/app-CkUasUOQ.css') }}">
    
    <title>Teste Fatto</title>
</head>
<body class="bg-white font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        @yield('content')
    </div>
    
    <script src="{{ asset('js/Modal.js') }}"></script>
    <script src="{{ asset('js/EditModal.js') }}"></script>
    <script src="{{ asset('js/DeleteModal.js') }}"></script>
    <script src="{{ asset('js/Message.js') }}"></script>
    <script src="{{ asset('js/AnimationTask.js') }}"></script>    
</body>
</html>
