

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
@dump($message)
@if($message)
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
            <div class="py-1">
                <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20">
                    <path
                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                </svg>
            </div>
            <div>
                <p class="font-bold">{{$message}}</p>
            </div>
        </div>
    </div>
@endif

<h1 class="bg-custom-gray text-white text-center py-1">HOME</h1>


<div class="h-full justify-between items-center  grid gap-3grid grid-cols-6 gap-4">
    <div class="col-span-2 bg-gray-300  h-full">
        <div class="grid grid-cols-4 h-full">
            <div class="col-span-1 bg-[#D90368] p-2 flex items-center justify-center">
                <h2>Catégories</h2>
            </div>
            <div class="col-span-3 p-2  justify-center items-center">
                <form method="get" class="p-2 w-auto space-y-2">
                    @csrf
                    <div>
                        <label for="asso_id" class="block">Entre asso_id</label>
                        <input type="text" name="asso_id" id="asso_id" placeholder="Entrer le nom de l'asso">
                    </div>
                    <div>
                        <label for="query" class="block">Entre query</label>
                        <input type="text" name="query" id="asso_id" placeholder="Entrer le nom de l'item">
                    </div>

                    <div>
                        <label for="categories" class="block">Selectionne une categorie</label>

                        <select name="categories" id="categories"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">
                            @foreach($categories as $cat)
                                <option value={{$cat->name}}>{{$cat->name}}</option>
                            @endforeach
                        </select>

                        {{--
                                                <input type="text" name="category" id="category" placeholder="Entrer le nom de la category">
                        --}}
                    </div>
                    <button type="submit" class="bg-red-500 text-white p-1 rounded-md">Entrer</button>

                </form>
            </div>


        </div>

    </div>

    <div class="col-span-4  p-4">
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
