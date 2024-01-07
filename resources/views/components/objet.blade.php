@props(['class'])

<div class="">
    <div class="flex flex-row shadow-lg m-4 transition-all duration-300 bg-white rounded-lg">
            <img src="{{ asset('assets/chaise.png') }}" class="w-32 h-auto p-0 m-0" alt="Image objet">

        <div class="w-full p-4 bg-gray-100">
            <h1><b>Id: </b>{{$class->id}}</h1>
            <h1><b>Name: </b>{{$class->name}}</h1>
            <h1><b>Asso: </b>{{$class->asso_id}}</h1>

            <h2><b>Categories:</b> </h2>
            @foreach($class->categories as $category)
            <p>{{$category['name']}}</p>
            @endforeach
        </div>
        <div class="w-full border-s-2 border-dashed border-l-rose-600 p-4  ltr bg-gray-100 rounded-br rounded-tr">
            <div class="">
                <h2>Position de l'objet</h2>
                @if($class->private)
                    <button disabled class="mt-4 ml-4 bg-zinc-400 text-white px-4 py-2 rounded">Non empruntable</button>

                @else
                    <a href="/demandeEmprunt/{{$class->id}}"><button class="mt-4 ml-4 bg-[#D90368] text-white px-4 py-2 rounded hover:bg-sky-700">Emprunter</button></a>

                @endif
            </div>
        </div>
    </div>
</div>

{{--<h3>Nom de l'objet: {{ $objet->nom }}</h3>--}}
{{--<p>État: {{ $objet->etat }}</p>--}}
