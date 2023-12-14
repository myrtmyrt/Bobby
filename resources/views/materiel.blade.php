@props(['classes'=>null])
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>
<body>


@include('.header')


<h1 class="bg-custom-gray text-white text-center py-1">HOME</h1>

{{--<div class="flex justify-between items-center p-12">--}}
{{--    <div class="flex">--}}
{{--        <h2 class="bg-[#D90368]">Catégories</h2>--}}
{{--        <h1 class="p-32">Faire une recherche</h1>--}}
{{--    </div>--}}
{{--</div>--}}

<div>

    <div class="container pt-12">

        <div class="flex">
            <div class="shadow-lg px-12">
                <h1 class="text-2xl font-bold mb-4">Faire une recherche</h1>
                <form method="get"  class="container mx-auto m-2">
                    @csrf
                    <div class="flex items-center">
                        <input type="text" value="{{ $request->input('query') }}" name="query" id="item_name" value="" class="border border-[#D90368] px-3 py-2 mr-2 rounded-md" placeholder="item class name">
                        <input type="text" name="asso_id" id="asso_id" value="{{ $request->input('asso_id') }}" class="border border-[#D90368] px-3 py-2 mr-2 rounded-md" placeholder="asso id">
                        <button type="submit" class="bg-[#D90368] text-white px-4 py-2 rounded-md">Rechercher</button>
                    </div>
                </form>

                <form method="post"  action="materiel/create" class="container mx-auto m-2">
                    @csrf
                    <div class="flex items-center">
                        <input type="text" name="itemName" id="item_name" value="" class="border border-[#D90368] px-3 py-2 mr-2 rounded-md" placeholder="item class name">
                        <button type="submit" class="bg-[#D90368] text-white px-4 py-2 rounded-md">Rechercher</button>
                    </div>
                </form>
                <h1 class="text-2xl font-bold mb-4">Catégories</h1>
                <div class="flex flex-col space-y-5">
                    <a class="text-lg hover:text-[#D90368]" href="home.blade.php">Meubles</a>
                    <a class="text-lg hover:text-[#D90368]" href="home.blade.php">Déguisements</a>
                    <a class="text-lg hover:text-[#D90368]" href="home.blade.php">Décorations</a>
                </div>


            </div>
            <div class="flex flex-col items-center">
                <h1 class="text-2xl font-bold mb-4">Liste des Items</h1>
                @if(count($classes) > 0)
                    <table class="min-w-full bg-white border border-gray-300">
                        {{--                <thead>--}}
                        {{--                <tr>--}}
                        {{--                    <th class="py-2 px-4 border-b">ID</th>--}}
                        {{--                    <th class="py-2 px-4 border-b">Nom</th>--}}
                        {{--                    <th class="py-2 px-4 border-b">Asso_id</th>--}}
                        {{--                </tr>--}}
                        {{--                </thead>--}}
                        <tbody>
                        @foreach($classes as $class)
                            @include('components.objet', [
                            'nom' => $class->id,
                            'etat' => $class->name,
                            'position' => $class->asso_id
                            ])
                            {{--                    <tr class="text-center">--}}
                            {{--                        <td class="py-2 px-4 border-b ">{{ $class->id }}</td>--}}
                            {{--                        <td class="py-2 px-4 border-b">{{ $class->name }}</td>--}}
                            {{--                        <td class="py-2 px-4 border-b">{{ $class->asso_id }}</td>--}}
                            {{--                    </tr>--}}
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Aucun item trouvé.</p>
                @endif
            </div>
        </div>


    </div>





</div>
@include('.footer')

</body>

</html>