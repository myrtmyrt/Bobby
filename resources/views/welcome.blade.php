<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        <div class="flex h-screen justify-center items-center gap-6">
            @if(session("user"))
                {{ session("user")['firstName'] }} {{ session("user")['lastName'] }} -
                {{ session("user")["assos"][0]["user_role"]["name"] }} @ {{ session("user")["assos"][0]["shortname"] }}
                <a href="/logout" class="bg-red-50 rounded-full">déconnexion</a>
            @else
                <a href="/login" class="bg-red-50 rounded-full">connexion</a>
            @endif
        </div>
    </body>
</html>
