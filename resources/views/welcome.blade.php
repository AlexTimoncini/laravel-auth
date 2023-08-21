<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel-Template</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
    <nav class="navbar navbar-dark bg-dark justify-content-between">
            <a class="navbar-brand" href="#">
                <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                Bootstrap
            </a>
            <div>
                <a href="{{ route('login') }}" class="">Log in</a>
                <a href="{{ route('register') }}" class="">Register</a>
            </div>
    </nav>

        <section class="guest">
            <h1>Hello There, Dont'be shy Join Our Group!</h1>
            <button>

            </button>
        </section>
    </body>
</html>
