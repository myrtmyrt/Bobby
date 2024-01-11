@props(['class'=>null, 'conditions'=>null])

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
    <div class="p-4">
        <div>
            <h2 class="text-xl">{{$class->name}}</h2>
        </div>
        <form method="post" action="/ajouterItems" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @for($i=0; $i<$nb_items; $i++)
            <h2 class="text-lg">Item {{$i+1}}: </h2>
                    <input type="hidden" name="items[{{$i}}][class_id]" value="{{$class->id}}"></input>

                    <label for="monoItem{{$i}}" class="block text-gray-700 text-sm font-bold mb-2">Mono item :</label>
                    <input type="checkbox" name="items[{{$i}}][monoItem]" id="monoItem{{$i}}" class="">

                <label for="quantity{{$i}}" class="block text-gray-700 text-sm font-bold mb-2">Quantité :</label>
                <input type="number" name="items[{{$i}}][quantity]" id="quantity{{$i}}" class="">

                <label for="condition{{$i}}" class="block text-gray-700 text-sm font-bold mb-2">Etat de l'item :</label>
                <select name="items[{{$i}}][condition]" id="condition{{$i}}">
                    @foreach($conditions as $cond)
                        <option value="{{$cond}}">{{$cond}}</option>
                    @endforeach
                </select>
                <div class="mb-4">
                    <label for="description{{$i}}" class="block text-gray-700 text-sm font-bold mb-2">Description :</label>
                    <textarea name="items[{{$i}}][description]" id="description{{$i}}" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 "></textarea>
                </div>
            @endfor

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-[#D90368] hover:bg-pink-700 text-white font-bold py-2 px-4 rounded "> Créer items</button>
            </div>
        </form>
    </div>
</div>

</body>

@include('.footer')
</html>
