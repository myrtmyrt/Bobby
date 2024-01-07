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
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<header class="bg-#FFFFFF text-#73747A p-3 flex items-center content-center justify-between">
    <div class="flex items-center">
        <div class="flex-shrink-0 mr-2">
            <img src="{{ asset('assets/logoBobby.png') }}" alt="Logo" class="h-12">
        </div>
        <div class="flex p-4 relative inline-block justify-center items-center text-center">
            <h2 class="mr-4">Connecté.e en tant que : </h2>

            @if(count(session('user')['assos']) > 1)
                <form method="GET" action="/changeAsso">
                    @csrf

                    <div class="relative">
                        <select name="changeAsso" id="changeAsso"
                                class="appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline-blue focus:border-blue-300 bg-no-repeat bg-right">
                            @foreach(session('user')['assos'] as $asso)
                                <option value="{{ $asso['login'] }}">{{ $asso['login'] }}</option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M10 12l-6-6-1.414 1.414L10 14.828l7.414-7.414L16 6z"/>
                            </svg>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>

    @if (session("user"))
        <nav class="flex justify-center items-center">
            <div class="relative">

                <a href="/materiel" class="mr-4 hover:text-[#D90368]">Voir le matériel de la fédération</a>
                {{--            <div class="absolute hidden mt-2 space-y-2 bg-white rounded-md shadow-md border border-gray-300 w-40">--}}
                {{--                <a href="/materiel/evenementiel" class="block px-4 py-2 hover:text-[#D90368]">Evènementiel</a>--}}
                {{--                <a href="/materiel/decoration" class="block px-4 py-2 hover:text-[#D90368]">Décoration</a>--}}
                {{--                <a href="/materiel/meubles" class="block px-4 py-2 hover:text-[#D90368]">Meubles</a>--}}
                {{--                <a href="/materiel/deguisements" class="block px-4 py-2 hover:text-[#D90368]">Déguisements</a>--}}
                {{--            </div>--}}
            </div>

            <a href="/emprunts" class="mr-4 hover:text-[#D90368]">Mes emprunts</a>
            <div class="relative group">
                <a href="/myAsso" class="mr-4 hover:text-[#D90368]">Mon Association</a>
                <div class="absolute hidden mt-2 space-y-2 bg-white rounded-md shadow-md border border-gray-300 w-40">
                    <a href="/materiel/evenementiel" class="block px-4 py-2 hover:text-[#D90368]">Gérer mes emprunts</a>
                    <a href="/materiel/decoration" class="block px-4 py-2 hover:text-[#D90368]">Faire mon inventaire</a>
                </div>
            </div>

            @endif
            @if (session("user"))
                <!-- User is logged in, show logout button -->
                <a href="/logout">
                    <button class="ml-4 w-8 h-8 bg-[#D90368] rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/>
                        </svg>
                    </button>
                </a>
            @else
                <!-- User is not logged in, show login button -->
                <a href="/login">
                    <button class="mt-4 ml-4 bg-[#D90368] text-white px-4 py-2 rounded hover:bg-sky-700">Connexion</button>
                </a>
            @endif
        </nav>

</header>

<script>
    // JavaScript pour afficher/cacher le sous-menu au survol
    const group = document.querySelector('.group');
    const subMenu = document.querySelector('.absolute');

    let mouseTimer;

    group.addEventListener('mouseover', function () {
        clearTimeout(mouseTimer);
        subMenu.classList.remove('hidden');
    });

    group.addEventListener('mouseleave', function () {
        mouseTimer = setTimeout(() => {
            subMenu.classList.add('hidden');
        }, 200); // Délai en millisecondes avant de masquer le sous-menu
    });

    // Annuler le délai si la souris revient sur le sous-menu
    subMenu.addEventListener('mouseover', function () {
        clearTimeout(mouseTimer);
    });

    // Cacher le sous-menu s'il n'est pas survolé
    subMenu.addEventListener('mouseleave', function () {
        subMenu.classList.add('hidden');
    });
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    // if there is message and message_type in url parameters, show toast
    const urlParams = new URLSearchParams(window.location.search);
    const message = urlParams.get('message');
    const messageType = urlParams.get('message_type');
    if (message && messageType) {
        const typeColorMap = {
            success: "#10B981",
            danger: "#EF4444",
        }
        Toastify({
            text: message,
            duration: 3000,
            close: true,
            gravity: "bottom",
            position: "right",
            stopOnFocus: true,
            backgroundColor: typeColorMap[messageType],
        }).showToast();
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Détecter le changement de sélection et soumettre automatiquement le formulaire
        $('#changeAsso').on('change', function () {
            $('#changeAssoForm').submit();
        });
    });
</script>
