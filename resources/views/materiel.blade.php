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
<div>
<h1 class="text-center">Materiel</h1>
</div>

<div>
    @if(isset($classes))
        @dump($classes)

    @endif

    @if(isset($result))
        @dump($result)
    @endif

    {{--<input>

        <ul>
    @foreach($items as $item)
        <li>{{$item->description}}</li>
    @endforeach
    </ul>--}}

</div>


</html>
