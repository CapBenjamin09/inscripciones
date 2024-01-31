<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
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
</body>
</html>
