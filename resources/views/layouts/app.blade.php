<!doctype html>
<html lang="fr">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Romain Poulain, Samuel Galliani-Royer">
    <meta name="description" content="Flowr est une plateforme simple et conviviale qui vous permet de créer, partager et organiser des listes de cadeaux pour toutes les occasions.">
    <meta name="keywords" content="groupe, flowr, membres, cadeaux, listes, créer, rejoindre, gestion, création">
    <meta property="og:title" content="Flowr">
    <meta property="og:description" content="Flowr est une plateforme simple et conviviale pour créer, partager et organiser des listes de cadeaux.">
    <meta property="og:url" content="https://flowr.space">
    <meta property="og:type" content="website">
    <link rel="canonical" href="https://flowr.space">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Flowr</title>

    <!-- Fonts -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text><text y=%221.3em%22 x=%220.2em%22 font-size=%2276%22 fill=%22%23fff%22>sf</text></svg>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}" sizes="96x96" />
    <link rel="dns-prefetch" href="//fonts.bunny.net">

    @yield('custom_css')
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->

    @yield('custom_css')

</head>
<body>

        <main class="py-4">
            @yield('content')
        </main>

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
