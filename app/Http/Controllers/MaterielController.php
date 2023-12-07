<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ClassCategory;
use App\Models\Item;
use App\Models\ItemClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MaterielController extends Controller
{
    public function getAllClasses(Request $request){
        $classes = ItemClass::all();
        return view('materiel', ['classes' => $classes, 'request'=>$request]);
    }

    public function getClassByName($name, Request $request){
        //$result = ItemClass->where('name', 'like', '%'.$name.'%');
        $result = ItemClass::where('asso_id', 'like', "%".$name."%")->get();
        return view('materiel',  ['classes' => $result]);
    }

    public function getClasses(Request $request) {
        // if ?query, search by itemclass name
        // if ?asso_id, return only classes from this asso

        $query = $request->input('query');
        $asso_id = $request->input('asso_id');

        $classes = ItemClass::query();
        if ($query) {
            $classes = $classes->where('name', 'like', '%'.$query.'%');
        }
        if ($asso_id) {
            $classes = $classes->where('asso_id', $asso_id);
        }

        return view('materiel', ['classes' => $classes->get(), 'request'=>$request]);
    }

    public function searchClassesByAsso(Request $request) {
        $query = $request->input('query');
        $result = ItemClass::where('asso_id', 'like', "%".$query."%")->get();
        return view('materiel', ['classes' => $result]);
    }

    public function getAssoItems(Request $request){
        $asso = session("user")["assos"][0]["login"];
        $class_id = ItemClass::where('asso_id',$asso)->with('items')->get();
        return view('myAsso', ['items' => $class_id]);
    }

    public function getCategoryItems(Request $request){
        $category_name= $request->input('category');
        $category= Category::where('name',$category_name);
        $classes= ClassCategory::where('category',$category)->get();
//        dd($classes);
        $item = new Item();
        $result = $item->itemClass($classes);
        return view('materiel', ['items' => $result]);
    }

    public function itemsAvailable($class_id){
        $classes = new ItemClass();
        $result = $classes->items($class_id)->whereNull('unavailibility');
        return view('materiel', ['items'=> $result]);
    }


    public function create(Request $request){
        return view('materiel', ['classes' => [], 'request' => $request]);
    }




}
