@props(['message' => null, 'requests' => null])

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

<body >
<div class="w-screen transition-all bg-gray-50 fixed z-50 h-20 top-0 flex justify-between items-center px-10">
    @include('.header')
</div>

<div class="pt-20">
    <h1 class="bg-custom-gray text-white text-center py-1">Gérer mes demandes</h1>
    <div class="mt-8 px-4">
        <p class="text-xl font-bold">Mes demandes</p>
    </div>
    <div class="bg-gray-100 font-sans ">
        <div x-data="{ openTab: 1 }" class="p-8">
            <div class="max-w-md mx-auto">
                <div class="mb-4 flex space-x-4 p-2 bg-white rounded-lg shadow-md">
                    <button x-on:click="openTab = 1" :class="{ 'bg-[#D90368] text-white': openTab === 1 }" class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Toutes</button>
                    <button x-on:click="openTab = 2" :class="{ 'bg-[#D90368] text-white': openTab === 2 }" class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Validées</button>
                    <button x-on:click="openTab = 3" :class="{ 'bg-[#D90368] text-white': openTab === 3 }" class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Refusées</button>
                    <button x-on:click="openTab = 4" :class="{ 'bg-[#D90368] text-white': openTab === 4 }" class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">A traiter</button>
                </div>
            </div>
            <div x-show="openTab === 4" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-[#D90368]">
                <h2 class="text-2xl font-semibold mb-2 text-[#D90368]">Demandes a traiter</h2>
                @if(count($enAttente) > 0)
                    @foreach($enAttente as $request)
                        <x-request :request="$request" />
                    @endforeach
                @endif
            </div>
            <div x-show="openTab === 2" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-[#D90368]">
                <h2 class="text-2xl font-semibold mb-2 text-[#D90368]">Demandes validées</h2>
                @if(count($validees) > 0)
                    @foreach($validees as $request)
                        <x-request :request="$request" />
                    @endforeach
                @endif
            </div>
            <div x-show="openTab === 3" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-[#D90368]">
                <h2 class="text-2xl font-semibold mb-2 text-[#D90368]">Demandes refusées</h2>
                @if(count($refusees) > 0)
                    @foreach($refusees as $request)
                        <x-request :request="$request" />
                    @endforeach
                @endif
            </div>
            <div x-show="openTab === 1" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-[#D90368]">
                <h2 class="text-2xl font-semibold mb-2 text-[#D90368]">Toutes les demandes</h2>
                @if(count($requests) > 0)
                    @foreach($requests as $request)
                        <x-myRequest :request="$request" />
                    @endforeach
                    {{ $requests->links() }}
                @endif
            </div>
        </div>



    </div>

@include('.footer')

</body>

</html>
