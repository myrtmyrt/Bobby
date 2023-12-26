<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\ItemClass;
use App\Models\Materiel;
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
        $categories = Category::all();

        return view('materiel', ['classes' => $classes->get(),'categories'=>$categories]);
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
        $asso = $request->input('asso_id');
        $class_id = ItemClass::where('asso_id',$asso)->with('items')->get();
//        /*dd($class_id);*/
        $item = new Item();
        $result = $item->itemClass($class_id);
        return view('materiel', ['items' => $result]);
    }

    public function getCategoryItems(Request $request){
        $category= $request->input('category');

    }



    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'objectName' => 'required',
            'objectPosition' => 'required',
        ]);

        $asso = session("user")["assos"][0]["login"];

        // Créer un nouvel objet dans la base de données
        $newObject = ItemClass::create([

            'name' => $validatedData['objectName'],
            'description' => $validatedData['objectPosition'],
            'private' => False,
            'asso_id' => $asso
        ]);

        // Rediriger ou effectuer toute autre action après l'ajout
        return redirect()->back()->with('success', 'Objet ajouté avec succès');
    }

}
