<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Incluye jQuery si es necesario -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body class="bg-sky-50">
<main class="grid grid-cols-12">

    <section class="col-span-2">
        <x-layouts.navbar/>
    </section>

    <section class="col-span-10 py-5 px-2 pl-3">
        {{ $slot }}
    </section>

</main>

<footer class="fixed bottom-0 left-0 z-20 w-full p-4 bg-sky-50 border-t border-gray-200 shadow md:flex md:items-center md:justify-between md:p-6 h-4">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-6/12 px-4 mx-auto text-center">
                <div class="text-sm text-gray-500  py-1">
                    Todos los derechos reservados &copy; UVG
                </div>
            </div>
        </div>
    </div>
</footer>

@yield('js')

</body>
</html>
