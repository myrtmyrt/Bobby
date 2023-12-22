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

{{--
@include('.header')
--}}

<h1 class="bg-custom-gray text-white text-center py-1">HOME</h1>


<div class="flex justify-between items-center p-12">
    <div class="flex">
        <h2 class="bg-[#D90368]">Catégories</h2>
        <h1 class="p-32">Faire une recherche</h1>
    </div>

    <div class="p-24">
       {{-- <x-objet type="objet"></x-objet>
        <x-objet type="objet"></x-objet>
        <x-objet type="objet"></x-objet>--}}
    </div>
</div>

<div>
{{--
        @dump($classes)
--}}

{{--    @dump($request->session)--}}

    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Liste des Items</h1>

        @if(count($classes) > 0)
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Nom</th>
                    <th class="py-2 px-4 border-b">Asso_id</th>
                </tr>
                </thead>
                <tbody>
                @foreach($classes as $class)
                    <tr class="text-center">
                        <td class="py-2 px-4 border-b ">{{ $class->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $class->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $class->asso_id }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Aucun item trouvé.</p>
        @endif
    </div>





    <form method="get"  class="container mx-auto m-2" >
        @csrf
        <div class="flex items-center">
            <input type="text" name="asso_id" id="asso_id" value="" class="border border-red-700 px-3 py-2 mr-2 rounded-md" placeholder="Entrer le nom de l'asso'">
            <input type="text" name="query" id="asso_id" value="" class="border border-red-700 px-3 py-2 mr-2 rounded-md" placeholder="Entrer le nom de l'item">
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Entrer</button>
        </div>
    </form>


</div>

</body>

</html>
