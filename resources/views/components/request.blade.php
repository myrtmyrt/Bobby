@props(['request'])

<div class="container rounded-md">
    <div class="grid grid-cols-5 items-center shadow-lg m-4">
        <!-- Colonne 1 -->
        <div class="col-span-1">
            <img src="{{ asset('assets/chaise.png') }}" class="w-32 h-auto p-0 m-0" alt="Image objet">
        </div>

        <!-- Colonne 2 -->
        <div class="col-span-2">
            <h1></h1>
            <h1><b>Date début</b>: {{$request->debut_date->format('d-m-Y')}}</h1>
            <h1><b>Date fin</b>: {{$request->end_date->format('d-m-Y')}}</h1>
            <h1>Asso: {{$request->asso_id}}</h1>
            <h1 class="text-red-500">{{$request->state}}</h1>
            <h1>Name: {{$request['class'][0]['name']}}</h1>
        </div>

        <!-- Colonne 3 -->
        <div class="col-span-2 ltr h-full bg-gray-300">
            <div class="border-s-2 border-dashed border-l-rose-600 p-4">
                <!-- Afficher les items -->
                @foreach($request['items'] as $item)
                    <div class="py-2">
                        <h1>Item: {{$item['id']}}</h1>
                        <h1>Class ID: {{$item['class_id']}}</h1>
                    </div>
                @endforeach

                <!-- Boutons -->
                <div class="flex space-x-4 mt-4">
                    <a href="/accepterDemande/{{$request['id']}}" class="bg-[#D90368] hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">Accepter</a>
                    <a href="/refuserDemande/{{$request['id']}}" class="bg-[#D90368] hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">Refuser</a>
                </div>
            </div>
        </div>
    </div>
</div>
