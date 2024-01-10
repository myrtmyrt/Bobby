@props(['class'=>null])

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
    <body>
    <div>
        @include('.header')
    </div>

    <div class="pt-20">
        <div class="container p-4">
            @dump($class->id)
            <form method="post" action="/demandeEmprunt/{{$class->id}}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div>
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2 mx-auto">Nom de l'item :</label>
                    <input type="text" name="name" id="name" disabled value="{{$class->name}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                </div>
                <div>
                    <label for="belongs_to" class="block text-gray-700 text-sm font-bold mb-2">Proprietaire :</label>
                    <input type="text" name="belongs_to" id="belongs_to" disabled value="{{$class->asso_id}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 ">
                </div>
                <div>
                    <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Quantité :</label>
                    <input type="number" name="quantity" id="quantity"  value="1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 ">
                </div>

                <div class="mb-4">
                    <label for="debut_date" class="block text-gray-700 text-sm font-bold mb-2">Date de debut de l'emprunt:</label>
                    <input type="date" name="debut_date" id="debut_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 ">
                </div>

                <div class="mb-4">
                    <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">Date de fin de l'emprunt:</label>
                    <input type="date" name="end_date" id="end_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 ">
                </div>

                <div class="mb-4">
                    <label for="comment" class="block text-gray-700 text-sm font-bold mb-2">Commentaire :</label>
                    <textarea name="comment" id="comment" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 "></textarea>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-[#D90368] hover:bg-pink-700 text-white font-bold py-2 px-4 rounded ">Envoyer la demande</button>
                </div>
            </form>
        </div>
    </div>

    </body>

    @include('.footer')
</html>
