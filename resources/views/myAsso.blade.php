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
</div>

<body>

@include('.header')

<h1 class="bg-custom-gray text-white text-center py-1">HOME</h1>
<div class="p-4 relative inline-block">
    <h1>Vous etes connecté en tant que <b>{{session('user')['current_asso']['login']}}</b></h1>
    @if(count(session('user')['assos']) >1)
        <label for="changeAsso">Changer d'asso:</label>
        <select name="changeAsso" id="changeAsso" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
            @foreach(session('user')['assos'] as $asso)
                <option value="{{$asso['login']}}">{{$asso['login']}}</option>
            @endforeach
        </select>
    @endif
</div>

<div class="px-12 py-6">
    <div class="flex justify-end">
        <button class="mt-4 ml-4 bg-[#D90368] text-white px-4 py-2 rounded hover:bg-sky-700">Faire mon inventaire</button>
        <button id="addObjectButton" class="mt-4 ml-4 bg-[#D90368] text-white px-4 py-2 rounded hover:bg-sky-700">Ajouter un objet</button>

    </div>

    <div class="flex flex-col items-center">
        @if(count($items) > 0)
            <table class="min-w-full bg-white border border-gray-300">
                <tbody>
                @foreach($items as $item)
                    <x-objet :class="$item" />
                @endforeach
                </tbody>
            </table>
        @else
            <p>Aucun item trouvé.</p>
        @endif
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

        <button class="mt-4 bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Annuler</button>
    </div>
</div>

@include('.footer')
</body>

</html>


