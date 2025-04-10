<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @livewireStyles
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>مسابقة المثقف الأول</title>
</head>

<body class="bg-black h-screen">

    @yield('content')

    @include('layouts.floating-buttons')

    @livewireScripts
</body>

</html>