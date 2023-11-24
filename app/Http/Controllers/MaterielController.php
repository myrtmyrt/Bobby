<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MaterielController extends Controller
{
    public function index(){

        //$items = DB::table('items')->get();
        $items = ItemClass::all();
        $result = null;
        return view('materiel', ['items' => $items, 'result' => $result]);
    }

    public function getOneByName($name){
        //$result = ItemClass->where('name', 'like', '%'.$name.'%');
        $result = DB::table('item_classes')->where('name', 'like', '%'.$name.'%')->get();
        return view('materiel',  ['result' => $result]);
    }



}
