<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @wireUiScripts
    <script src="//unpkg.com/alpinejs" defer></script>

    <!--AUMENTO DE JAMIL-->

    @livewireStyles
</head>

<body class="font-sans  p-0 m-0">
    <div class=" ">
        {{$slot}}
        
    </div>
    


    @stack('modals')

    @livewireScripts
    @stack('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('guardado',(postID,descripcion)=>{
            Swal.fire(
            postID,
            descripcion,
            'success'
            )});
            Livewire.on('error',(postID,descripcion)=>{
            Swal.fire(
            postID,
            descripcion,
            'error'
            )});
    </script>
</body>

</html>