@props(['class'])

<div class="container rounded-md">
    <div class="grid grid-cols-5 items-center shadow-lg m-4">
        <div class="col-span-1">
            <img src="{{ asset('assets/chaise.png') }}" class="w-32 h-auto p-0 m-0" alt="Image objet">
        </div>
        <div class="col-span-2">
            <h1>{{$class->id}}</h1>
            <h1>{{$class->name}}</h1>
            <h1>{{$class->asso_id}}</h1>

            <h2>Categories: </h2>
            @foreach($class->categories as $category)
            <p>{{$category['name']}}</p>
            @endforeach
        </div>
        <div class="col-span-2 ltr h-full bg-gray-300">
            <div class=" border-s-2 border-dashed border-l-rose-600">
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
