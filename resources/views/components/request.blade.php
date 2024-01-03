@props(['request'])
<div class="container rounded-md">
    <div class="grid grid-cols-5 items-center shadow-lg m-4">
        <div class="col-span-1">
            <img src="{{ asset('assets/chaise.png') }}" class="w-32 h-auto p-0 m-0" alt="Image objet">
        </div>
        <div class="col-span-2">
            <h1></h1>
            <h1><b>Date debut</b> : {{$request->debut_date->format('d-m-Y')}}</h1>
            <h1><b>Date fin</b> : {{$request->end_date->format('d-m-Y')}}</h1>
            <h1>asso : {{$request->asso_id}}</h1>
            <h1 class="text-red-500">{{$request->state}}</h1>
            <h1>name: {{$request['class'][0]['name']}}</h1>

        </div>
        <div class="col-span-2 ltr h-full bg-gray-300">
            <div class=" border-s-2 border-dashed border-l-rose-600">
                @foreach($request['items'] as $item)
                    <h1>item: {{$item['id']}}</h1>
                    <h1>class id: {{$item['class_id']}}</h1>
                @endforeach

                    <a href=""><button type="submit" class="bg-[#D90368] hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">Accepter</button></a>
                    <a href=""><button type="submit" class="bg-[#D90368] hover:bg-pink-700 text-white font-bold py-2 px-4 rounded ">Refuser</button></a>

            </div>
        </div>
    </div>
</div>
