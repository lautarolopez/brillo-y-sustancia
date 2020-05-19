<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <title>Brillo y Sustancia - @yield('title')</title>
</head>

<body>
    @include('partials.admin_navbar')
    <main class="container-fliud content admin-layout">
        @yield('content')       
    </main>
    @section('scripts')
        @include('partials.scripts_js')
    @show
</body>
<script>
    let nav = document.querySelector('nav.admin-navbar');
    let chevronButton = document.querySelector('i.fa-chevron-left');
    let content = document.querySelector('.admin-layout');
    chevronButton.addEventListener('click', (e => {
        nav.classList.toggle('admin-nav-collapse');
        chevronButton.classList.toggle('collapsed');
        content.classList.toggle('collapsed');
    }))
</script>
</html>