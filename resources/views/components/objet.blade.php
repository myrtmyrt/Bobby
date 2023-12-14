<div class="flex items-center shadow-lg m-4">
    <img src="{{ asset('assets/chaise.png') }}" class="w-16 h-auto rounded-md p-0 m-0">

    <div class="ml-8 p-0">
        <h1>{{ $nom }}</h1>
        <h2>{{ $etat }}</h2>
    </div>

    <div class="p-12 ml-8">
        <h2>{{ $position }}</h2>
        <button class="mt-4 ml-4 bg-[#D90368] text-white px-4 py-2 rounded hover:bg-sky-700">Emprunter</button>
    </div>
</div>

{{--<h3>Nom de l'objet: {{ $objet->nom }}</h3>--}}
{{--<p>État: {{ $objet->etat }}</p>--}}
