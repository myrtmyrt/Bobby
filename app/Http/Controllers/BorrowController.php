<?php

namespace App\Http\Controllers;

use App\Models\BorrowRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;


class BorrowController extends Controller
{
    public function requests(){
        $result = BorrowRequest::all();
        return view('borrowRequests', ['requests' => $result]);
    }

    public function addRequest(Request $request)
    {
        $session = session('user');
        $asso_id = $session['id'];
        $debut_date = $request->query('debut_date');
        $end_date = $request->query('end_date');
        $comment = $request->query('comment');
        $borrowRequest = new BorrowRequest([
            'asso_id' => $asso_id,
            'debut_date' => $debut_date,
            'end_date' => $end_date,
            'comment' => $comment
        ]);

        $borrowRequest->save();
    }

}
