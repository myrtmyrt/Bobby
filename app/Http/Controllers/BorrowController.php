<?php

namespace App\Http\Controllers;

use App\Enum\ConditionEnum;
use App\Enum\RequestStateEnum;
use App\Http\Controllers\MaterielController;

use App\Models\BorrowRequest;
use App\Models\Item;
use App\Models\ItemClass;
use App\Models\Unavailibility;
use Illuminate\Http\Request;
use Carbon\Carbon;
use function Termwind\render;


class BorrowController extends Controller
{
    public function getForm($class_id){
        $class = ItemClass::where('id',$class_id)->get();
        //dd($classes);


        return view('borrowRequests', ['class'=>$class[0]]);
    }

    public function addRequest(Request $request, $class_id)
    {
        $class = ItemClass::find($class_id);
        $items = $class->items;

        $filtered = $items->filter(function ($item) {
            return $item->isAvailable();
        });
        $quantity = $request->input('quantity');
        if(!(count($filtered) < $quantity)) {
            $stateOrder = [ConditionEnum::Neuf, ConditionEnum::TB, ConditionEnum::Bon, ConditionEnum::Moyen, ConditionEnum::Mauvais, ConditionEnum::TM];
            $itemsOrdered = $filtered->sortBy(function ($item) use ($stateOrder) {
                return array_search($item->conditions->sortByDesc('created_at')->first()->condition, $stateOrder);
            });

            $session = session('user')['email'];
            $asso_id = session('user')['current_asso']['login'];
            $debut_date = $request->input('debut_date');
            $end_date = $request->input('end_date');
            $comment = $request->input('comment');

            //créer demande d'emprunt
            $borrowRequest = new BorrowRequest([
                'asso_id' => $asso_id,
                'debut_date' => $debut_date,
                'end_date' => $end_date,
                'comment' => $comment
            ]);

            $result = $borrowRequest->save();
            if ($result) {

                $itemsToAttach = $itemsOrdered->take($quantity);
                foreach ($itemsToAttach as $item) {
                    // Ajoutez l'entrée à la table pivot avec les informations nécessaires
                    $borrowRequest->items()->attach($item->id);
                }

                $message = "Demande prise en compte avec succes";
                session(['message' => $message]);
                session(['message_type' => 'success']);
                return redirect()->route("materiel");

            }else {
                $message = "Echec de la demande";
                session(['message' => $message]);
                session(['message_type' => 'danger']);
                return redirect('demandeEmprunt/'.$class_id);            }
        }else {
            $message = "Quantité trop importante";
            session(['message' => $message]);
            session(['message_type' => 'danger']);
            return redirect('demandeEmprunt/'.$class_id);

        }
    }

    public function getAssoRequests() //les demandes que l'asso a faites
    {
        $asso = session('user')['current_asso']['login'];

        $requests = BorrowRequest::whereHas('items.itemClass', function ($query) use ($asso) {
            $query->where('asso_id', $asso);
        })->with(['items' => function ($query) {
            $query->select('items.id', 'class_id');
        }]);

        /*foreach ($requests as $request){
            $class_id = $request->items[0]['class_id'];
            $class = ItemClass::find($class_id);
            $request['class'] = $class;
        }*/


        $result1 = $requests->get()->filter(function ($request) {
            return $request['state'] == RequestStateEnum::EnAttente;
        });

        $result2 = $requests->get()->filter(function ($request) {
            return $request['state'] == RequestStateEnum::Validee;
        });

        $result3 = $requests->get()->filter(function ($request) {
            return $request['state'] == RequestStateEnum::Refusee;
        });

        $paginatesRequests = $requests->paginate(10);

        return view('manageRequests', ['requests' => $paginatesRequests, 'enAttente' => $result1, 'validees'=>$result2, 'refusees'=>$result3]);

    }


    public function denyRequest($request_id){
        $request = BorrowRequest::find($request_id);
        $request->state = RequestStateEnum::Refusee;
        $request->save();

        $message = "Demande refusée";
        session(['message' => $message]);
        session(['message_type' => 'success']);
        return redirect('gererDemandes');
    }

    public function acceptRequest($request_id){
        $request = BorrowRequest::find($request_id);
        $request->state = RequestStateEnum::Validee;
        $request->save();

        $message = "Demande acceptée";
        session(['message' => $message]);
        session(['message_type' => 'success']);
        return redirect('gererDemandes');
    }

    public function deleteRequest($request_id){
        $request = BorrowRequest::find($request_id);
        if (!$request) {
            $message = "La demande n'existe pas.";
            session(['message' => $message]);
            session(['message_type' => 'error']);
            return redirect('mesDemandes');
        }
        $request->items()->detach();

        $request->delete();

        $message = "Demande suprimée";
        session(['message' => $message]);
        session(['message_type' => 'success']);
        return redirect('mesDemandes');

    }

}
