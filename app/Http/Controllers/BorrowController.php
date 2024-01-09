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
   /* public function requests(){
        $result = BorrowRequest::all();
        return view('borrowRequests', ['requests' => $result]);
    }*/
    // changer de vue --> vue pour voir ses borrow requests

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

    public function getAssoRequests()
    {
        $asso = session('user')['current_asso']['login'];

       /* $requests = BorrowRequest::all()->where('state', RequestStateEnum::EnAttente);

        $asso_requests = $requests->filter(function ($request) use ($asso) {
            return $request->isAssoRequest($asso);
        }); // tri pour récupérer les demandes qui s'adressent a l'asso
        dd($asso_requests->first()->items->first()->itemclass['id']);
        foreach ($asso_requests as $request) {
            $items = $request->items()->get();
            $request->items = $items;

            $class = $items->first()->itemClass()->get();
            $request->class = $class;

        }*/

//        $requests = BorrowRequest::join('bobby.borrow_request_item as bri', 'borrow_requests.id', '=', 'bri.borrow_request_id')
//            ->join('bobby.items as i', 'bri.item_id', '=', 'i.id')
//            ->join('bobby.item_classes as ic', 'i.class_id', '=', 'ic.id')
//            ->where('ic.asso_id', '=', 'comedmus')
//            ->get();

        $assoId = 'comedmus';

        $requests = BorrowRequest::whereHas('items.itemClass', function ($query) use ($assoId) {
            $query->where('asso_id', $assoId);
        })
            ->with(['items' => function ($query) {
                $query->select('items.id', 'class_id');
            }])
            ->paginate(10);
        //dd($requests);

        return view('manageRequests', ['requests' => $requests]);
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
