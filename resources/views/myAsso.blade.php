@props(['classes'=>null])
    <!DOCTYPE html>

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

@dump($items)
{{--<div class="container mx-auto mt-8">--}}
{{--    <h1 class="text-2xl font-bold mb-4">Liste des Items</h1>--}}

{{--    @if(count($classes) > 0)--}}
{{--        <table class="min-w-full bg-white border border-gray-300">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th class="py-2 px-4 border-b">ID</th>--}}
{{--                <th class="py-2 px-4 border-b">Nom</th>--}}
{{--                <th class="py-2 px-4 border-b">Asso_id</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($classes as $class)--}}
{{--                <tr class="text-center">--}}
{{--                    <td class="py-2 px-4 border-b ">{{ $class->id }}</td>--}}
{{--                    <td class="py-2 px-4 border-b">{{ $class->name }}</td>--}}
{{--                    <td class="py-2 px-4 border-b">{{ $class->asso_id }}</td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    @else--}}
{{--        <p>Aucun item trouvé.</p>--}}
{{--    @endif--}}
{{--</div>--}}

@include('.footer')
</body>
