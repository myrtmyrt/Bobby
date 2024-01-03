@props(['class'=>null, 'message'=>null, 'requests'=>null])

<html>
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
<body>
@include('.header')

<div>
    <p>Demandes de l'asso {{session('user')['current_asso']['login']}}</p>
</div>

<div>
    @if(count($requests) >0)
        @foreach($requests as $request)
            <x-request type="request" :request="$request"></x-request>

        @endforeach
    @endif
</div>
</body>
</html>
