@props(['request'])

<div class="">
    <div class="flex flex-row shadow-lg m-4 transition-all duration-300 bg-white rounded-lg shadow-md ">

            <img src="{{ asset('assets/chaise.png') }}" class="w-32 h-auto p-4 m-0" alt="Image objet">

        <div class="w-full p-4 bg-gray-100">
            <h1><b>Demande</b>: {{$request->id}}</h1>
            <h1><b>Date début</b>: {{$request->debut_date->format('d-m-Y')}}</h1>
            <h1><b>Date fin</b>: {{$request->end_date->format('d-m-Y')}}</h1>
            <h1>Asso: {{$request->asso_id}}</h1>
            @if( $request->state == \App\Enum\RequestStateEnum::Refusee)
                <h1 class="text-red-500">{{$request->state}} </h1>

            @elseif($request->state == \App\Enum\RequestStateEnum::Validee)
                <h1 class="text-green-500">{{$request->state}}</h1>

            @else
                <h1 class="text-orange-500">{{$request->state}}</h1>

            @endif
            @if($request['class'])
                <h1>Name: {{$request['class'][0]['name']}}</h1>
            @endif
        </div>

        <div class="w-full border-s-2 border-dashed border-l-rose-600 p-4  ltr bg-gray-100">
            <div class="">
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
                    <a href="/supprimerDemande/{{$request['id']}}" class="bg-[#D90368] hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
