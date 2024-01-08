

@props(['classes'=>null, 'message'=> null])
    <!DOCTYPE html>

<html lang="fr">
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
<body class="h-lvh">

@include('.header')


<h1 class="bg-custom-gray text-white text-center py-1">Matériel de la fédération</h1>


<div class="h-full justify-between items-center  grid gap-3grid grid-cols-6 gap-4">
    <div class="col-span-2 bg-gray-200  h-full">
        <div class="grid grid-cols-4 h-full">
            <div class="col-span-3 p-2 justify-center items-center relative">
                <form method="get" class="p-4 w-auto space-y-2 sticky top-0 z-10">
                    @csrf
                    <div>
                        <label for="asso_id" class="block">Recherche par association : </label>
                        <input type="text" name="asso_id" id="asso_id" class="mb-4 block w-full border border-[#D90368] px-1 py-2 rounded-md" placeholder="Entrer le nom de l'asso">
                    </div>
                    <div>
                        <label for="query" class="block">Recherche par objet :</label>
                        <input type="text" name="query" id="asso_id" class="mb-4 block w-full border border-[#D90368] px-3 py-2 rounded-md" placeholder="Entrer le nom de l'item">
                    </div>

                    <div>
                        <label for="categories" class="block ">Recherche par catégorie :</label>

                        <select name="categories" id="categories"
                                class="mt-1 block w-full p-2 border border-[#D90368] rounded-md shadow-sm">
                            @foreach($categories as $cat)
                                <option value={{$cat->name}}>{{$cat->name}}</option>
                            @endforeach
                        </select>

                        {{--
                                                <input type="text" name="category" id="category" placeholder="Entrer le nom de la category">
                        --}}
                    </div>
                    <button type="submit" class="bg-[#D90368] text-white px-4 py-2 rounded hover:bg-sky-700">Entrer</button>

                </form>
            </div>


        </div>

    </div>

    <div class="col-span-4 transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-[#D90368] m-4">
        @if(count($classes) > 0)
            @foreach($classes as $index => $class)
                <x-objet type="objet" :class="$class"></x-objet>
            @endforeach
                <div class="mx-8 my-6">
                    {{ $classes->links() }}
                </div>
        @else
            <p>Aucun item trouvé.</p>
        @endif
    </div>
</div>

<div>
    {{--
            @dump($classes)
    --}}

    {{--    @dump($request->session)--}}

    {{--<div class="container mx-auto mt-8">
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
    </div>--}}


</div>

</body>

</html>
