<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MaterielController extends Controller
{
    public function index(){

        $items = DB::table('items')->get();

        return view('materiel', ['items' => $items]);
    }

    public function getOneByName($name){
        $result = DB::table('item_classes')->where('name', 'like', '%'.$name.'%')->get();
        return view('materiel',  ['result' => $result]);
    }
}
