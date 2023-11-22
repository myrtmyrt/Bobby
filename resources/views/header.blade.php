<!DOCTYPE html>

<style>

    body {
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
    }

    .bg-custom-gray {
        background-color: #73747A;
    }

    .text-custom-color {
        color: #D90368;
    }

    .logo {
        position: absolute;
        width: 84px;
        height: 86px;
        left: 57px;
        top: 3px;
        background: #D9D9D9;
        border: 2px solid #73747A;
        border-radius: 1px;
    }

</style>

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<header class="bg-#FFFFFF text-#73747A p-4 flex items-center justify-between">
    <div class="flex-shrink-0 mr-6">
        <img src="{{ asset('assets/logoBobby.png') }}" alt="Logo" class="h-8">
    </div>
    <nav class="flex items-center">
        <a href="/materiel" class="mr-4 hover:text-[#D90368]">Materiel</a>
        <a href="/inventaire" class="mr-4 hover:text-[#D90368]">Inventaire</a>
        <a href="/emprunts" class="mr-4 hover:text-[#D90368]">Mes emprunts</a>
        <a href="/asso" class="mr-4 hover:text-[#D90368]">Mon Association</a>
        <button class="mt-4 ml-4 bg-[#D90368] text-white px-4 py-2 rounded">Connexion</button>
        <div class="ml-4 w-6 h-6 bg-[#D90368] rounded-full flex items-center justify-center">
            <span class="text-white text-2xl material-icons-outlined">X</span>
        </div>
        <div class="ml-4 w-6 h-6 bg-[#D90368] rounded-full flex items-center justify-center">
            <span class="text-white text-2xl material-icons-outlined">X</span>
        </div>
    </nav>

    <div class="ml-auto">
    </div>
</header>
