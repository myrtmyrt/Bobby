<?php

namespace App\Http\Controllers;

use App\Models\BorrowRequest;
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
    public function addRequest(Request $request, $class_id)
    {
/*        dd($class_id);*/

        $session = session('user')['email'];
        $asso_id = $class_id;
        $debut_date = $request->input('debut_date');
        $end_date = $request->input('end_date');
        $comment = $request->input('comment');
/*        dd($debut_date);*/
        $borrowRequest = new BorrowRequest([
            'asso_id' => $asso_id,
            'end_date' => $end_date,
            'comment' => $comment
        ]);
        $borrowRequest['debut_date'] = $debut_date;
//        dd($borrowRequest);

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
