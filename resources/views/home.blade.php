<!DOCTYPE html>

<style>
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
    </head>
    <div <--!class="flex w-full h-screen justify-center items-center">
    <header class="bg-#FFFFFF text-#73747A p-4 flex items-center">
        <div class="flex-shrink-0 mr-6">
            <img src="../../public/assets/logoBobby.png alt="Logo" class="h-8">
        </div>
        <nav class="flex">
            <a href="/materiel"" class="mr-4 hover:text-[#D90368]">Materiel</a>
            <a href="/inventaire" class="mr-4 hover:text-[#D90368]">Inventaire</a>
            <a href="/emprunts" class="mr-4 hover:text-[#D90368]">Mes emprunts</a>
            <a href="/asso" class="mr-4 hover:text-[#D90368]">Mon Association</a>
        </nav>
        <button class="mt-4 bg-[#D90368] text-white px-4 py-2 rounded">Connexion</button>
        <div class="w-6 h-6 bg-[#D90368] rounded-full"></div>
        <div class="w-6 h-6 bg-[#D90368] rounded-full"></div>
        <div class="ml-auto">
        </div>
    </header>
    <h1 class="bg-custom-gray text-white text-center py-2">HOME</h1>
    <div>Hello</div>

    <div class="flex p-24">
        <div class="flex-1 pr-8">
            <h2 class="text-2xl font-semibold mb-4">Qu’est-ce que Bobby?</h2>
            <p>Bobby est l’outil proposé par le SIMDE permettant aux associations de gérer leur matériel via un système d’inventaire.</p>
            <p>Avec Bobby, profitez aussi du système d’emprunt. Vous avez besoin de matériel? Vérifiez d’abord qu’une autre asso ne le possède pas déjà!</p>
            <button class="mt-4 bg-[#D90368] text-white px-4 py-2 rounded">Découvrir Bobby</button>
        </div>

        <div class="flex-1">
            <img src="chemin-vers-votre-image.jpg" alt="Image de Bobby" class="w-full h-auto rounded-md">
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 p-28">
        <div class="bg-gray-100 p-6 rounded-md">
            <h2 class="text-lg font-semibold mb-4">Materiel</h2>
            <p>Dans cet onglet, retrouve tout le matériel disponible sur Bobby. Il correspond au matériel que les associations acceptent de prêter. Si tu souhaites réserver un item, appuie sur le bouton "emprunter" et remplis la feuille d'emprunt.</p>
        </div>

        <div class="bg-gray-100 p-6 rounded-md">
            <h2 class="text-lg font-semibold mb-4">Inventaire</h2>
            <p>Dans cet onglet, tu as accès à tout le matériel de ton association.</p>
        </div>

        <div class="bg-gray-100 p-6 rounded-md">
            <h2 class="text-lg font-semibold mb-4">Mes emprunts</h2>
            <p>Dans cet onglet, tu as accès à tout le matériel de ton association.</p>
        </div>

        <div class="bg-gray-100 p-6 rounded-md">
            <h2 class="text-lg font-semibold mb-4">Inventaire</h2>
            <p>Dans cet onglet, tu as accès à tout le matériel de ton association.</p>
        </div>
    </div>



    <footer class="bg-custom-gray text-white p-8">
        <div class="container mx-auto flex justify-center">
            <div class="w-1/2 mr-8 text-center">
                <h2 class="text-xl font-bold mb-4">Le BDE</h2>
                <div class="flex items-center mb-2">
                    <img src="chemin-vers-logo-salle.png" alt="Logo Salle" class="mr-2">
                    <p>Salle BF E101</p>
                </div>
                <div class="flex items-center mb-2">
                    <img src="chemin-vers-logo-email.png" alt="Logo Email" class="mr-2">
                    <p>bde@assos.utc.fr</p>
                </div>
                <div class="flex items-center mb-2">
                    <img src="chemin-vers-logo-person.png" alt="Logo Person" class="mr-2">
                    <p>Roger Delacom</p>
                </div>
                <div class="flex items-center mb-2">
                    <img src="chemin-vers-logo-bde.png" alt="Logo BDE" class="mr-2">
                    <p>bde_utc</p>
                </div>
                <p class="mt-4"><a href="#">Contacter le BDE</a></p>
            </div>

            <div class="w-1/2 text-center">
                <h2 class="text-xl font-bold mb-4">Le SIMDE</h2>
                <div class="flex items-center mb-2">
                    <img src="chemin-vers-logo-salle.png" alt="Logo Salle" class="mr-2">
                    <p>Salle...</p>
                </div>
                <div class="flex items-center mb-2">
                    <img src="chemin-vers-logo-email.png" alt="Logo Email" class="mr-2">
                    <p>simde@assos.utc.fr</p>
                </div>
                <div class="flex items-center mb-2">
                    <img src="chemin-vers-logo-person.png" alt="Logo Person" class="mr-2">
                    <p>Jessy Mde</p>
                </div>
                <p class="mt-4"><a href="#">Contacter le SIMDE</a></p>
            </div>
        </div>
        <h3 class="text-center">Bobby a été développé et est maintenu par le SiMDE (Service informatique de la Maison des étudiants)
            © 2023 Bureau des étudiants de l’UTC</h3>
    </div>




</html>
