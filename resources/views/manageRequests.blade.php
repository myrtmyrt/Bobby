@props(['class' => null, 'message' => null, 'requests' => null])

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body>
<div class="bg-white">
    @include('.header')
</div>

<div class="pt-20">
    <h1 class="bg-custom-gray text-white text-center py-1">Gérer mes emprunts</h1>
    <div class="mt-8 px-4">
        <p class="text-xl font-bold">Demandes de l'asso {{ session('user')['current_asso']['login'] }}</p>
    </div>

    <div class="mt-4">
        @if(count($requests) > 0)
            @foreach($requests as $request)
                <x-request :request="$request" />
            @endforeach
        @endif
    </div>
</div>

</body>

</html>
