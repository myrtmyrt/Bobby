<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MaterielController extends Controller
{
    public function getAllClasses(){

        //$items = DB::table('items')->get();
        $classes = ItemClass::all();
        return view('materiel', ['classes' => $classes]);
    }

    public function getClassByName($name){
        //$result = ItemClass->where('name', 'like', '%'.$name.'%');
        $result = DB::table('item_classes')->where('name', 'like', '%'.$name.'%')->get();
        return view('materiel',  ['result' => $result]);
    }

    public function getAllItems(){
        $items = Item::all();
        return view('materiel', ['items' => $items]);
    }

    public function getAssoItems(Request $request){
        $items = $request->input('asso_id');
        /*$items = DB::table('item_classes')->where('item_classes.asso_id', '=', $asso)
            ->join('items', 'items.class_id','=', 'item_classes.id');*/
        \Log::info('toto');
        return view('materiel', ['items' => $items]);
    }



}
