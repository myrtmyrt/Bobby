@props(['class'])

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            const modifyObjectButton = $('#modifyObjectButton');
            const updateObjectForm = $('#updateObjectForm');
           /* const deleteObjectButton = $('#deleteObjectButton');*/

            modifyObjectButton.on('click', function (e) {
                e.preventDefault();
                updateObjectForm.removeClass('hidden');
            });

           /* deleteObjectButton.on('click', function (e) {
                e.preventDefault();

                if (confirm("Êtes-vous sûr de vouloir supprimer cet objet?")) {
                    // Récupérez l'ID de l'objet pour la suppression
                    const objectId = $(this).data('objectId');

                    // Envoyez une requête AJAX pour supprimer l'objet
                    $.ajax({
                        url: '/deleteObject/' + objectId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}', // Ajoutez le jeton CSRF
                        },
                        success: function (data) {
                            alert('Objet supprimé avec succès');
                            // Redirigez ou effectuez d'autres actions si nécessaire
                        },
                        error: function (error) {
                            alert('Erreur lors de la suppression de l\'objet');
                        }
                    });
                }
            });*/
        });
    </script>
</head>

<div class="">
    <div class="flex flex-row shadow-lg m-4 transition-all duration-300 bg-white rounded-lg">
        <img
            @if(Str::startsWith($class->image, 'http'))
                src="{{ $class->image }}"
            @else
                src="{{ Storage::disk('public')->url($class->image) }}"
            @endif
            class="max-w-24 max-h-24 p-0 m-0"
        >

        <div class="w-full p-6 p-4 bg-gray-100">
            <h1 class="text-xl"><b>{{$class->name}}</b></h1>
            <h1><b>Id: </b>{{$class->id}}</h1>
            <h1><b>Association: </b>{{$class->asso_id}}</h1>
            <h2><b>Categorie: </b>
                @foreach($class->categories as $category)
                    {{ $category->name }}
                    @if (!$loop->last)
                        ,
                    @endif
                @endforeach
            </h2>
            <h1><b>Items:</b> {{$class['items']->count()}}</h1>

        </div>
        <div class="w-full border-s-2 border-dashed border-l-rose-600 p-4  ltr bg-gray-100 rounded-br rounded-tr">
            <div>
                <h2><b>Position de l'objet : </b>{{$class->position}}</h2>
                @if(!request()->is('myAsso'))
                    @if($class->private)
                        <button disabled class="mt-4 ml-4 bg-zinc-400 text-white px-4 py-2 rounded">Non empruntable
                        </button>
                    @else
                        <a href="/demandeEmprunt/{{$class->id}}">
                            <button class="mt-4 ml-4 bg-[#D90368] text-white px-4 py-2 rounded hover:bg-sky-700">
                                Emprunter
                            </button>
                        </a>
                    @endif
                @else
                    <div class="flex">
                        <button id="modifyObjectButton"
                                class="bg-[#D90368] hover:bg-pink-700 mt-4 ml-4 px-4 py-2 text-white rounded flex items-center">
                            Modifier l'objet
                        </button>

                        <a href="/deleteObject/{{$class->id}}"><button id="deleteObjectButton" data-object-id="{{ $class->id }}" class="bg-red-600 hover:bg-red-800 mt-4 ml-4 px-4 py-2 text-white rounded flex items-center">
                                Supprimer l'objet
                            </button></a>
                    </div>

                @endif
            </div>
        </div>
    </div>

    <div id="updateObjectForm" class="fixed top-20 inset-0 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center overflow-y-auto">
        <div class="bg-white p-8 rounded-lg mx-auto">
            <form action="{{ route('updateObject', ['id' => $class->id]) }}" enctype="multipart/form-data" method="post">
                @csrf
                <label for="objectName">Nom de l'objet:</label>
                <input type="text" name="objectName" id="objectName" required value="{{$class->name}}"
                       class="mb-4 block w-full border border-[#D90368] px-3 py-2 rounded-md">

                <label for="objectPosition">Position de l'objet:</label>
                <input type="text" name="objectPosition" id="objectPosition" required value="{{$class->position}}"
                       class="mb-4 block w-full border border-[#D90368] px-3 py-2 rounded-md">

                <label for="objectCategory">Catégorie de l'objet:</label>
                <select name="objectCategory" id="objectCategory"
                        class="mt-1 block w-full p-2 border border-[#D90368] rounded-md shadow-sm">
                    @foreach(\App\Models\Category::all() as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>

                <label for="objectImage">Image correspondant à l'objet:</label>
                <input type="file" name="objectImage" id="objectImage" required
                       class="mb-4 block w-full border border-[#D90368] px-3 py-2 rounded-md">

                <button type="submit" class="bg-[#D90368] text-white px-4 py-2 rounded hover:bg-sky-700">Modifier
                </button>
            </form>
            <a href="/myAsso">
                <button class="mt-4 bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Annuler</button>
            </a>
        </div>
    </div>
</div>
