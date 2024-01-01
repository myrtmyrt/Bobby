<?php

namespace App\Http\Controllers;

use App\Enum\ConditionEnum;
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
            // j'ai l'impression que le tri par condition ne marche pas?? Je sais pas pourquoi

            dd($itemsOrdered->map(function ($item) use ($stateOrder) {
                return $item->conditions->sortByDesc('created_at')->first()->condition;
            }));
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

/*                dd($borrowRequest->items);*/

                if ($result) {
                    //$message = "Succes de l'ajout";
                    return redirect()->route("materiel")->with('message', "Succès de l'ajout");
                } else {
                    $message = "Echec de l'ajout";
                    return redirect()->route("demandeEmprunt", ['message' => $message]);

                }
            }else {
                $message = "Echec de la Borrow Request";
                return redirect()->route("demandeEmprunt", ['message' => $message]);

            }
        }else {
            $message = "Quantité trop importante";
            return redirect()->route("demandeEmprunt", ['message' => $message]);

        }
    }

    public function getAssoRequests(){
        $asso = session('user')['current_asso']['login'];
//        dd($asso);
        $requests = BorrowRequest::all()->where(['asso_id',$asso],['state', 'En attente'] );
        /*->where('state', 'En attente')*/
        dd($requests);
        return view('manageRequests', ['requests' => $requests]);
    }

}
