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

<body>
@include('.header')

<div class="mt-8 px-4">
    <p class="text-xl font-bold">Mes demandes</p>
</div>
<div class="bg-gray-100 font-sans ">
    <div x-data="{ openTab: 1 }" class="p-8">
        <div class="max-w-md mx-auto">
            <div class="mb-4 flex space-x-4 p-2 bg-white rounded-lg shadow-md">
                <button x-on:click="openTab = 1" :class="{ 'bg-[#D90368] text-white': openTab === 1 }" class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Section 1</button>
                <button x-on:click="openTab = 2" :class="{ 'bg-[#D90368] text-white': openTab === 2 }" class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Section 2</button>
                <button x-on:click="openTab = 3" :class="{ 'bg-[#D90368] text-white': openTab === 3 }" class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Section 3</button>
            </div>
        </div>
        <div x-show="openTab === 1" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-[#D90368]">
            <h2 class="text-2xl font-semibold mb-2 text-[#D90368]">Section 1 Content</h2>
            @if(count($requests) > 0)
                @foreach($requests as $request)
                    <x-request :request="$request" />
                @endforeach
            @endif
        </div>

        <div x-show="openTab === 2" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-600">
            <h2 class="text-2xl font-semibold mb-2 text-blue-600">Section 2 Content</h2>
            <p class="text-gray-700">Proin non velit ac purus malesuada venenatis sit amet eget lacus. Morbi quis purus id ipsum ultrices aliquet Morbi quis.</p>
        </div>

        <div x-show="openTab === 3" class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-600">
            <h2 class="text-2xl font-semibold mb-2 text-blue-600">Section 3 Content</h2>
            <p class="text-gray-700">Fusce hendrerit urna vel tortor luctus, nec tristique odio tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
        </div>
    </div>
</div>
@include('.footer')

</body>

</html>
