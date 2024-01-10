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

{{--<footer class="bg-custom-gray text-white p-8">--}}
{{--    <div class="container mx-auto flex justify-center">--}}
{{--        <div class="w-1/2 mr-8 text-center">--}}
{{--            <h2 class="text-xl font-bold mb-4">Le BDE</h2>--}}
{{--            <div class="flex items-center mb-2">--}}
{{--                <img src="{{ asset('assets/Lieu.png') }}" alt="Logo Email" class="mr-2">--}}
{{--                <p>Salle BF E101</p>--}}
{{--            </div>--}}
{{--            <div class="flex items-center mb-2">--}}
{{--                <img src="{{ asset('assets/Mail.png') }}" alt="Logo Email" class="mr-2">--}}
{{--                <p>bde@assos.utc.fr</p>--}}
{{--            </div>--}}
{{--            <div class="flex items-center mb-2">--}}
{{--                <img src="{{ asset('assets/Facebook.png') }}" alt="Logo FB" class="mr-2">--}}
{{--                <p>Roger Delacom</p>--}}
{{--            </div>--}}
{{--            <div class="flex items-center mb-2">--}}
{{--                <img src="{{ asset('assets/Facebook.png') }}" alt="Logo BDE" class="mr-2">--}}
{{--                <p>bde_utc</p>--}}
{{--            </div>--}}
{{--            <p class="mt-4"><a href="#">Contacter le BDE</a></p>--}}
{{--        </div>--}}

{{--        <div class="w-1/2 text-center">--}}
{{--            <h2 class="text-xl font-bold mb-4">Le SIMDE</h2>--}}
{{--            <div class="flex items-center mb-2">--}}
{{--                <img src="{{ asset('assets/Lieu.png') }}" alt="Logo Email" class="mr-2">--}}
{{--                <p>Salle...</p>--}}
{{--            </div>--}}
{{--            <div class="flex items-center mb-2">--}}
{{--                <img src="{{ asset('assets/Mail.png') }}" alt="Logo Email" class="mr-2">--}}
{{--                <p>simde@assos.utc.fr</p>--}}
{{--            </div>--}}
{{--            <div class="flex items-center mb-2">--}}
{{--                <img src="{{ asset('assets/Facebook.png') }}" alt="Logo FB" class="mr-2">--}}
{{--                <p>Jessy Mde</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <br>--}}
{{--    <h3 class="text-center text-xs">Bobby a été développé et est maintenu par le SiMDE (Service informatique de la Maison des étudiants)--}}
{{--        <br> © 2023 Bureau des étudiants de l’UTC</h3>--}}
{{--</footer>--}}

<footer class="flex-shrink-0 w-full bg-gray-500">
    <div class="w-3/4 m-auto flex justify-center items-start p-12 text-white  ">
        <div class="w-1/2 pt-1 mb-5  ">
            <h3 class="text-xl tracking-[.2em] font-medium pb-5 ml-12">Le BDE</h3>
            <ul class="pt-4 mb-3">
                <li><img src="{{ asset('assets/Lieu.png') }}" width=20px alt="Lieu-icon" class="inline mr-2 ">Salle BF
                    E101
                </li>
                <li><img src="{{ asset('assets/Mail.png') }}" width=20px alt="Mail-icon" class="inline mr-2 ">bde@assos.utc.fr
                </li>
                <li><img src="{{ asset('assets/Facebook.png') }}" width=10px alt="Facebook-icon" class="inline mr-4 ">Roger
                    Delacom
                </li>
                <li><img src={Instagram} width=20px alt="Instagram-icon" class="inline mr-2 ">bde_utc</li>
            </ul>
            <button
                class='hover:shadow-primary  hover:shadow font-medium transition-shadow w-1/2 text-white py-2 px-4 bg-primary mt-3  rounded'>
                Contacter le BDE
            </button>
        </div>
        <div class="w-1/4  mb-5">
            <h3 class="text-xl font-medium p-2 tracking-[.2em] pb-5 ml-6 ">Le SiMDE</h3>
            <ul class="pt-4 mb-7">
                <li><img src="{{ asset('assets/Lieu.png') }}" width=20px alt="Lieu-icon" class="inline mr-2 ">Salle ...
                </li>
                <li><img src="{{ asset('assets/Mail.png') }}" width=20px alt="Mail-icon" class="inline mr-2 ">simde@assos.utc.fr
                </li>
                <li><img src="{{ asset('assets/Facebook.png') }}" width=10px alt="Facebook-icon" class="inline mr-4 ">Jessy
                    MDE
                </li>
            </ul>
            <button
                class=" hover:shadow-primary  hover:shadow font-medium transition-shadow w-full text-white py-2 px-4 mt-4 bg-primary rounded">
                Contacter le SiMDE
            </button>
        </div>

    </div>
    <div class="block text-center text-white text-sm">Le portail associatif de l’UTC a été développé et est maintenu par
        le SiMDE (Service informatique de la Maison des étudiants) <br> © 2023 Bureau des étudiants de l’UTC
    </div>


    {{--Vider message et message_type--}}
    {{--{{ session(['message'=> null])}}
    {{session(['message_type'=> null])}}--}}

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

</footer>

