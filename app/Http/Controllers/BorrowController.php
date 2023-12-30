<?php

namespace App\Http\Controllers;

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

    /*public function isAvailable($item){
//        dd($item->unavailibility);
        foreach ($item->unavailibilities as $unavailibility){
            if($unavailibility->end_date->gt(now()->format('Y-m-d H:i:s')) && $unavailibility->start_date->lt( now()->format('Y-m-d H:i:s'))){
                return false;
            }
        }
        return true;
    }*/
    public function addRequest(Request $request, $class_id)
    {
        $class = ItemClass::find($class_id);
        $items = $class->items;

        $filtered = $items->filter(function ($item) {
            return $item->isAvailable();
        });
        $quantity = $request->input('quantity');
        if(!(count($filtered) < $quantity)) {
            $stateOrder = ['Neuf', 'Tres Bon', 'Bon', 'Moyen', 'Mauvais', 'Tres Mauvais'];

            $itemsOrdered = $filtered->sortBy(function ($item) use ($stateOrder) {
                return array_search(($item->conditions->sortBy('updated_at')->first())['condition'], $stateOrder);
            });
            // j'ai l'impression que le tri par condition ne marche pas?? Je sais pas pourquoi

            /*        dd($itemsOrdered);*/

            $session = session('user')['email'];
            $asso_id = $class_id;
            $debut_date = $request->input('debut_date');
            $end_date = $request->input('end_date');
            $comment = $request->input('comment');

            //créer demande d'emprunt
            $borrowRequest = new BorrowRequest([
                'asso_id' => $asso_id,
                'end_date' => $end_date,
                'comment' => $comment
            ]);
            $borrowRequest['debut_date'] = $debut_date;

            $result = $borrowRequest->save();

            //créer rows dans borrowed_items
            for($i=0; $i<$quantity; $i++){
               /*$borrowed_items = new BorrowedItem([
                   'quantity' => $quantity,
                   'borrow_id' => $borrowRequest['id']
               ]);*/
            }

            if ($result) {
//                $message = "Succes de l'ajout";
                return redirect()->route("materiel")->with('message', "Succès de l'ajout");
            } else {
                $message = "Echec de l'ajout";
                return redirect()->route("demandeEmprunt", ['message' => $message]);

            }
        }
        else{
            $message = "Quantité trop importante";
            return redirect()->route("demandeEmprunt", ['message' => $message]);

        }
    }

}
