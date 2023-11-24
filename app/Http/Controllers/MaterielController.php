<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MaterielController extends Controller
{
    public function getAllClasses(){
        $classes = ItemClass::all();
        return view('materiel', ['classes' => $classes]);
    }

    public function getClassByName($name){
        //$result = ItemClass->where('name', 'like', '%'.$name.'%');
        $result = ItemClass::where('name', 'like', '%'.$name.'%')->get();
        return view('materiel',  ['classes' => $result]);
    }

    public function getAssoItems(Request $request){
        $asso = $request->input('asso_id');
        $class_id = ItemClass::where('asso_id',$asso)->with('items')->get();
        dd($class_id);
        $item = new Item();
        $result = $item->itemClass($class_id);
        return view('materiel', ['items' => $result]);
    }

    



}
