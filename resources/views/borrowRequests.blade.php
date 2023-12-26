@props(['class'=>null, 'message'=>null])

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
    @include('.header')

    <div class="container p-4">
        {{--@dump(session('message'))
        @if(session('message') )
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <p class="font-bold">{{session('message')}}</p>
                    </div>
                </div>
            </div>
        @endif
--}}
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

                <div class="mb-4">
                    <label for="debut_date" class="block text-gray-700 text-sm font-bold mb-2">Date de fin de l'emprunt:</label>
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
    </body>
</html>
