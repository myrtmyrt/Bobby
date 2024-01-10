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
<body class="flex flex-col h-lvh">

<div class="w-screen transition-all bg-gray-50 fixed z-50 h-20 top-0 flex justify-between items-center px-10">
    @include('.header')
</div>

<div class="mt-20">
    <h1 class="bg-custom-gray text-white text-center py-1">Matériel de la fédération</h1>


    <div class="h-full justify-between items-center  grid gap-3grid grid-cols-7 gap-4">
        <div class="col-span-2 bg-gray-200  h-full">
            <div class="grid grid-cols-4 h-full">
                <div class="col-span-3 p-2 justify-center items-center relative">
                    <form method="get" class="p-4 w-auto space-y-2 sticky top-0 z-10">
                        @csrf
                        <div>
                            <label for="asso_id" class="block">Recherche par association : </label>
                            <input type="text" name="asso_id" id="asso_id"
                                   class="mb-4 block w-full border border-[#D90368] px-1 py-2 rounded-md"
                                   placeholder="Entrer le nom de l'asso">
                        </div>
                        <div>
                            <label for="query" class="block">Recherche par objet :</label>
                            <input type="text" name="query" id="asso_id"
                                   class="mb-4 block w-full border border-[#D90368] px-3 py-2 rounded-md"
                                   placeholder="Entrer le nom de l'item">
                        </div>

                        <div>
                            <label for="categories" class="block ">Recherche par catégorie :</label>

                            <select name="categories" id="categories"
                                    class="mt-1 block w-full p-2 border border-[#D90368] rounded-md shadow-sm">
                                                                <option value=""></option>
                                @foreach($categories as $cat)
                                    <option value={{$cat->id}}>{{$cat->name}}</option>
                                @endforeach
                            </select>

                            {{--
                                                    <input type="text" name="category" id="category" placeholder="Entrer le nom de la category">
                            --}}
                            <div class="flex pb-5 space-y-5">
                            </div>
                            <button type="submit"
                                    class="bg-[#D90368] text-white px-4 py-2 rounded hover:bg-sky-700 mb-4">Rechercher
                            </button>
                            <a href="/materiel">
                                <button type="submit"
                                        class="bg-[#D90368] text-white px-4 py-2 rounded hover:bg-sky-700">Réinitialiser
                                    la recherche
                                </button>
                            </a>
                        </div>

                    </form>
                </div>


            </div>

        </div>

        <div
            class="col-span-5 transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-[#D90368] m-4">
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
    </div>

</div>

@include('.footer')
</body>

</html>
