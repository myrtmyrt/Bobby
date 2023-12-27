<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MaterielController;

use App\Models\BorrowRequest;
use App\Models\Item;
use App\Models\ItemClass;
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

    public function isAvailable($item){
        foreach ($item->unavailibility as $unavailibility){
            if($unavailibility->end_date > now()->toDateTimeString('Y-m-d')&& $unavailibility->start_date < now()->toDateTimeString('Y-m-d')){
                return false;
            }
        }
        return true;
    }
    public function addRequest(Request $request, $class_id)
    {
        /*$class = new ItemClass();
        $items = $class->items();
        foreach ($items as $currentItem){
            $available = $this->isAvailable($currentItem);
            $items = $items->reject(function ($item) use ($currentItem) {
                return $item == $currentItem;
            });
        }
        $stateOrder = ['neuf', 'tresBon', 'bon', 'moyen', 'mauvais', 'tresMauvais'];

        $itemsOrdered = $items->sortBy(function ($item) use ($stateOrder) {
            return array_search($item['state'], $stateOrder);
        });*/

        $session = session('user')['email'];
        $asso_id = $class_id;
        $debut_date = $request->input('debut_date');
        $end_date = $request->input('end_date');
        $comment = $request->input('comment');
        $borrowRequest = new BorrowRequest([
            'asso_id' => $asso_id,
            'end_date' => $end_date,
            'comment' => $comment
        ]);
        $borrowRequest['debut_date'] = $debut_date;

        $result = $borrowRequest->save();

        if($result){
            $message = "Succes de l'ajout";
            return redirect()->route("materiel")->with('message', "Succès de l'ajout");
        }else{
            $message = "Echec de l'ajout";
            return redirect()->route("demandeEmprunt", ['message'=>$message]);

        }
    }

}
