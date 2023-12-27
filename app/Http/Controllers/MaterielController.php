<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $category = $request->input('category');

        $classes = ItemClass::query();
        $classes->with('categories');
        if ($query) {
            $classes = $classes->where('name', 'like', '%'.$query.'%');
        }
        if ($asso_id) {
            $classes = $classes->where('asso_id', $asso_id);
        }
        $classes=$classes->paginate(10);
        $categories = Category::all();


        return view('materiel', compact('classes', 'categories'));
    }

    public function searchClassesByAsso(Request $request) {
        $query = $request->input('query');
        $classes = ItemClass::where('asso_id', 'like', "%".$query."%")->get();
        /*foreach ($classes as $element){
            $element = $element.categ
        }*/
        return view('materiel', ['classes' => $classes]);
    }

    public function getAssoItems(Request $request){
        $asso = session("user")["assos"][0]["login"];
        $class_id = ItemClass::where('asso_id',$asso)->with('items')->get();
        return view('myAsso', ['items' => $class_id]);
    }


    public function getCategoryItems(Request $request){
        $category= $request->input('category');

    }






}
