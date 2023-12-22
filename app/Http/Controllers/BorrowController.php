<?php

namespace App\Http\Controllers;

use App\Models\BorrowRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;


class BorrowController extends Controller
{
   /* public function requests(){
        $result = BorrowRequest::all();
        return view('borrowRequests', ['requests' => $result]);
    }*/
    // changer de vue --> vue pour voir ses borrow requests

    public function getForm(/*$item_id*/){
        return view('borrowRequests'/*, ['item_id'=>$item_id]*/);
    }
    public function addRequest(Request $request)
    {
        $session = session('user');
/*        $asso_id = $session['id'];*/
        $asso_id = $request->input('asso_id');
        $debut_date = $request->input('debut_date');
        $end_date = $request->input('end_date');
        $comment = $request->input('comment');
        $borrowRequest = new BorrowRequest([
            'asso_id' => $asso_id,
            'debut_date' => $debut_date,
            'end_date' => $end_date,
            'comment' => $comment
        ]);

        $borrowRequest->save();
    }

}
