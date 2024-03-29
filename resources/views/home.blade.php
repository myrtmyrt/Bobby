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

    section {
        position: relative;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;

    }

    section .content {
        position: relative;
        z-index: 1;
        margin: 0 auto;
    }

    section:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #F16EAC;
        border-radius: 50% 50% 0 0/100% 100% 0 0;
        transform: scaleX(1.5);
    }


</style>

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
<div class="w-screen transition-all bg-gray-50 fixed z-50 h-20 top-0 flex justify-between items-center px-10">
    @include('.header')
</div>

<div class="pt-20">
    <h1 class="bg-custom-gray text-white text-center py-1">Bienvenue sur le nouveau Bobby !</h1>

    <div class="bg-gray-100 flex p-12 items-center">
        <div class="flex-1 pr-8">
            <h2 class="text-2xl font-semibold mb-4">Qu’est-ce que Bobby?</h2>
            <p>Bobby est l’outil proposé par le SIMDE permettant aux associations de gérer leur matériel via un système
                d’inventaire.</p>
            <p class="pb-8">Avec Bobby, profitez aussi du système d’emprunt. Vous avez besoin de matériel? Vérifiez
                d’abord qu’une autre asso ne le possède pas déjà!</p>
            @if (session("user"))
                <a href="/materiel">
                    <button class="mt-4 bg-[#D90368] text-white px-4 py-2 rounded">Découvrir Bobby</button>
                </a>
            @else
                <a href="/login">
                    <button class="mt-4 bg-[#D90368] text-white px-4 py-2 rounded">Connecte toi pour découvrir Bobby !</button>
                </a>
            @endif

        </div>

        <div class="mx-auto w-1/2 p-0 m-0">
            <img src="{{ asset('assets/image_logique.png') }}" class="w-full touch-auto h-auto rounded-md p-0 m-0">
        </div>
    </div>

    <div class="grid grid-cols-2 gap-16 p-24">
        <div class="bg-gray-100 p-6 rounded-md shadow-lg">
            <h2 class="text-lg font-semibold mb-4">Materiel</h2>
            <p>Dans cet onglet, retrouve tout le matériel disponible sur Bobby. Il correspond au matériel que les
                associations acceptent de prêter. Si tu souhaites réserver un item, appuie sur le bouton "emprunter" et
                remplis la feuille d'emprunt.</p>
        </div>

        <div class="bg-gray-100 p-6 rounded-md shadow-lg">
            <h2 class="text-lg font-semibold mb-4">Mes emprunts</h2>
            <p>Dans cet onglet, tu as accès à tout les demandes d'emprunts que ton association a effectuée.</p>
        </div>

        <div class="bg-gray-100 p-6 rounded-md shadow-lg">
            <h2 class="text-lg font-semibold mb-4">Mon association</h2>
            <p>Dans cet onglet, tu as accès à tout le matériel de ton association.</p>
        </div>

    </div>

    {{--        <section>--}}
    {{--            <div class="content p-24">--}}
    {{--                <h2 class="m-0 p-0 text-2xl">Besoin d'aide</h2>--}}
    {{--                <br>--}}
    {{--                <p class="m-0 p-0 text-base p-24">Nous sommes là pour répondre à toutes questions, contacte-nous sans hésitations dès que tu en as le besoin !--}}

    {{--                    S’il s’agit d’une question sur la vie associative, ton BDE préféré sera ravi de t’aider.--}}
    {{--                    Si tu souhaites signaler un bug ou si tu as une question informatique à propos des services numériques associatifs ou de ton association, ton SiMDE préféré sera ravi de t’aider.--}}
    {{--                </p>--}}
    {{--            </div>--}}
    {{--        </section>--}}


    <div class="bg-[#F16EAC] px-32 py-10">
        <h2 class="text-2xl">Besoin d'aide</h2>
        <br>
        <p class=" text-base">Nous sommes là pour répondre à toutes questions, contacte-nous sans
            hésitations dès que tu en as le besoin !

            S’il s’agit d’une question sur la vie associative, ton BDE préféré sera ravi de t’aider.
            Si tu souhaites signaler un bug ou si tu as une question informatique à propos des services numériques
            associatifs ou de ton association, ton SiMDE préféré sera ravi de t’aider.
        </p>
    </div>
    @include('.footer')
</div>
</body>
</html>
