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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addObjectButton = document.getElementById('addObjectButton');
            const addObjectForm = document.getElementById('addObjectForm');
            const closeFormButton = document.getElementById('closeForm');

            addObjectButton.addEventListener('click', function () {
                addObjectForm.classList.remove('hidden');
            });

            closeFormButton.addEventListener('click', function () {
                addObjectForm.classList.add('hidden');
            });
        });
    </script>
</head>

<div class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden items-center justify-center">
        <button class="mt-4 bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Fermer</button>
    </div>


<body>

@include('.header')

<h1 class="bg-custom-gray text-white text-center py-1">HOME</h1>
<div class="p-4 flex flex-row">
    <div class="flex p-4 relative inline-block justify-center items-center">
        <h1>Vous etes connecté en tant que</h1>

        @if(count(session('user')['assos']) >1)
{{--            <label for="changeAsso">Changer d'asso:</label>--}}

            <form id="changeAssoForm" method="GET" action="/changeAsso">
                @csrf

                <div class="relative">
                    <select name="changeAsso" id="changeAsso" class="appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline-blue focus:border-blue-300 bg-no-repeat bg-right">
                        <option value="{{ session('user')['current_asso']['login'] }}" selected>{{ session('user')['current_asso']['login'] }}</option>
                        @foreach(session('user')['assos'] as $asso)
                            @if($asso['login'] !== session('user')['current_asso']['login'])
                                <option value="{{ $asso['login'] }}">{{ $asso['login'] }}</option>
                            @endif
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M10 12l-6-6-1.414 1.414L10 14.828l7.414-7.414L16 6z"/>
                        </svg>
                    </div>
                </div>

                <button type="submit" class="mt-4 bg-[#D90368] text-white px-4 py-2 rounded hover:bg-sky-700">
                    Changer d'association
                </button>
            </form>
        @endif
    </div>
    <div>
        <a href="/gererDemandes"><button class="mt-4 bg-[#D90368] text-white px-4 py-2 rounded hover:bg-sky-700">Gérer les demandes</button></a>
        {{--    <a href="/mesDemandes"><button class="mt-4 bg-[#D90368] text-white px-4 py-2 rounded hover:bg-sky-700">Mes demandes</button></a>--}}

    </div>
    <div class="">
        <button class="mt-4 ml-4 bg-[#D90368] text-white px-4 py-2 rounded hover:bg-sky-700">Faire mon inventaire</button>
        <button id="addObjectButton" class="mt-4 ml-4 bg-[#D90368] text-white px-4 py-2 rounded hover:bg-sky-700">Ajouter un objet</button>

    </div>
</div>

<div class="mt-8 px-4">
    <p class="text-xl font-bold">Mes items</p>
</div>
<div class="">
    <div class="flex flex-col bg-gray-100 font-sans ">
        <div class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-[#D90368] m-4">

            @if(count($items) > 0)

                    @foreach($items as $item)
                        <x-objet :class="$item" />
                    @endforeach
                    {{ $items->links() }}
            @else
                <p>Aucun item trouvé.</p>
            @endif
        </div>
    </div>
</div>

<div id="addObjectForm" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg mx-auto">
        <form action="/addObject" method="post">
            @csrf
            <label for="objectName">Nom de l'objet:</label>
            <input type="text" name="objectName" id="objectName" required class="mb-4 block w-full border border-[#D90368] px-3 py-2 rounded-md">

            <label for="objectPosition">Position de l'objet:</label>
            <input type="text" name="objectPosition" id="objectPosition" required class="mb-4 block w-full border border-[#D90368] px-3 py-2 rounded-md">

            <button type="submit" class="bg-[#D90368] text-white px-4 py-2 rounded hover:bg-sky-700">Ajouter</button>
        </form>
        <a href="/myAsso">
            <button class="mt-4 bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Annuler</button>
        </a>

    </div>
</div>

@include('.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Détecter le changement de sélection et soumettre automatiquement le formulaire
        $('#changeAsso').on('change', function () {
            $('#changeAssoForm').submit();
        });
    });
</script>

</body>

</html>


