<?php

namespace App\Http\Controllers;

use App\Enum\RequestStateEnum;
use App\Models\BorrowRequest;
use App\Models\Category;
use App\Models\ItemClass;
use Illuminate\Http\Request;


class AssoController extends Controller
{
    public function getAssoItems(Request $request)
    {
        $categories = Category::all();
        $asso = session("user")["current_asso"]["login"];
        $class_id = ItemClass::where('asso_id', $asso)->with('items')->paginate(10);
        //$class_id = $class_id->paginate(10);
        return view('myAsso', ['items' => $class_id, 'categories'=>$categories]);
    }

    public function changeAsso(Request $request)
    {
        $name = $request->input('changeAsso');
        foreach (session('user')['assos'] as $asso) {
            if ($asso['login'] === $name) {
                $asso_found = $asso;
                break;
            }
        }
        $user = session('user');
        $user['current_asso'] = $asso_found;
        session(['user' => $user]);
        return $this->getAssoItems($request);
    }

    public function myRequests(){

        $asso = session('user')['current_asso']['login'];

        $requests = BorrowRequest::where('asso_id', $asso)->paginate(10);
        $result = BorrowRequest::all()->where('asso_id', $asso);


        $result1 = $result->filter(function ($request) {
            return $request['state'] == RequestStateEnum::EnAttente;
        });

        $result2 = $result->filter(function ($request) {
            return $request['state'] == RequestStateEnum::Validee;
        });

        $result3 = $result->filter(function ($request) {
            return $request['state'] == RequestStateEnum::Refusee;
        });

        return view('assoRequests', ['requests' => $requests, 'enAttente' => $result1, 'validees'=>$result2, 'refusees'=>$result3]);



    }


}
