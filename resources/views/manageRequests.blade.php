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
@include('.header')

<div class="mt-8 pt-20">
    <p class="text-xl font-bold px-4">Demandes adressées a l'asso {{ session('user')['current_asso']['login'] }}</p>
</div>

<div class="">
    <div class="flex flex-col bg-gray-100 font-sans ">
        <div class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-[#D90368] m-4">
            @if(count($requests) > 0)
                @foreach($requests as $request)
                    <x-request :request="$request" />
                @endforeach
                {{ $requests->links() }}
            @endif

        </div>
    </div>
</div>

@include('.footer')
</body>

</html>
