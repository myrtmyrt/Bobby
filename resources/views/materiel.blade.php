@props(['classes'=>null])
<!DOCTYPE html>

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

{{--
@include('.header')
--}}

<h1 class="bg-custom-gray text-white text-center py-1">HOME</h1>


<div class="flex justify-between items-center p-12">
    <div class="flex">
        <h2 class="bg-[#D90368]">Catégories</h2>
        <h1 class="p-32">Faire une recherche</h1>
    </div>

    <div class="p-24">
       {{-- <x-objet type="objet"></x-objet>
        <x-objet type="objet"></x-objet>
        <x-objet type="objet"></x-objet>--}}
    </div>
</div>

<div>
        @dump($classes)




    {{--<input>

        <ul>
    @foreach($items as $item)
        <li>{{$item->description}}</li>
    @endforeach
    </ul>--}}
    <form method="post">
        @csrf
        <input type="text" name="asso_id" id="asso_id" value="" class="border border-red-700">
        <button type="submit"  class="border border-red-500">Récupérer asso_id</button>
        </form>

</div>

</body>

</html>
