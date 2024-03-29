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

    [x-cloak] {
        display: none;
    }

    .duration-300 {
        transition-duration: 300ms;
    }

    .ease-in {
        transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
    }

    .ease-out {
        transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
    }

    .scale-90 {
        transform: scale(.9);
    }

    .scale-100 {
        transform: scale(1);
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
<header
    class="bg-#FFFFFF text-#73747A p-3 flex items-center content-center justify-between fixed top-0 left-0 right-0 z-50">
    <div class="flex items-center">
        <div class="flex-shrink-0 mr-2">
            <a href="/">
                <img src="{{ asset('assets/logoBobby.png') }}" alt="Logo" class="h-12">
            </a>

        </div>
        <div class="flex p-4 relative inline-block justify-center items-center text-center">
            @if (session("user"))
                Connecté.e en tant que :  <span
                    class="text-xl"> {{ session('user')['current_asso']['login'] }}</span> </h2>
            @endif
        </div>
    </div>
{{--    on affiche le matériel de la fédération et le bouton de logout que si le user est connecté --}}
    @if (session("user"))
        <nav class="flex justify-center items-center">
            <div class="relative">

                <a href="/materiel" class="mr-4 hover:text-[#D90368] relative">
                    Voir le matériel de la fédération
                </a>
            </div>

            <a href="/gererDemandes" class="mr-4 hover:text-[#D90368]">Gérer les demandes de prêts</a>
            <div class="relative group">
                <a href="/myAsso" class="mr-4 hover:text-[#D90368] relative group">
                    Mon Association
                </a>
                <div
                    class="group absolute hidden mt-2 space-y-2 bg-white rounded-md shadow-md border border-gray-300 w-40">
                    <a href="/mesDemandes" class="block px-4 py-2 hover:text-[#D90368]">Gérer mes emprunts</a>
                    <a href="/materiel/decoration" class="block px-4 py-2 hover:text-[#D90368]">Faire mon inventaire</a>
                </div>
            </div>
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
                <a href="/login">
                    <button class="mt-4 ml-4 bg-[#D90368] text-white px-4 py-2 rounded hover:bg-sky-700">Connexion
                    </button>
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
        }, 200);
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const message = @json(session('message'));
    const messageType = @json(session('message_type'));
    // console.log(messageType);
    // console.log(message);

    if (/*message && messageType*/1) {
        const typeColorMap = {
            success: "#10B981",
            danger: "#EF4444",
        }
        Toastify({
            // text: message,
            text: "ok",
            duration: 3000,
            close: true,
            gravity: "bottom",
            position: "right",
            stopOnFocus: true,
            // backgroundColor: typeColorMap[messageType],
            backgroundColor: typeColorMap['success'],
        }).showToast();
    }
</script>
{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
<script>
    $(document).ready(function () {
        $('#changeAsso').on('change', function () {
            $('#changeAssoForm').submit();
        });
    });
</script>


<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

