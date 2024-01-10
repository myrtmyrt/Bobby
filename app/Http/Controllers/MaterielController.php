<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\ItemClass;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MaterielController extends Controller
{
    public function getAllClasses(Request $request)
    {
        $classes = ItemClass::all();
        return view('materiel', ['classes' => $classes, 'request' => $request]);
    }

    public function getClassByName($name, Request $request)
    {
        //$result = ItemClass->where('name', 'like', '%'.$name.'%');
        $result = ItemClass::where('asso_id', 'like', "%" . $name . "%")->get();
        return view('materiel', ['classes' => $result]);
    }

    public function getClasses(Request $request)
    {
        // if ?query, search by itemclass name
        // if ?asso_id, return only classes from this asso

        $query = $request->input('query');
        $asso_id = $request->input('asso_id');
        $category = $request->input('categories');

        $classes = ItemClass::query();
        $classes->with('categories')->get();
        if ($query) {
            $classes = $classes->where('name', 'like', '%' . $query . '%');

        }
        if ($asso_id) {
            $classes = $classes->where('asso_id', 'like', '%' . $asso_id . '%');
        }
        /*if ($category) {
            $classes = ItemClass::whereHas('categories', function (Builder $query) use($category){
                $query->where('category_id', 'like', $category);
            })->get();
            dd($classes->first());

        }*/
        if ($category) {
            $classes = $classes->whereHas('categories', function ($query) use ($category) {
                $query->where('categories.id', $category);
            });
        }


        $classes = $classes->paginate(10);

        $categories = Category::all();


        return view('materiel', compact('classes', 'categories'));
    }

    public function searchClassesByAsso(Request $request)
    {
        $query = $request->input('query');
        $classes = ItemClass::where('asso_id', 'like', "%" . $query . "%")->get();
        /*foreach ($classes as $element){
            $element = $element.categ
        }*/
        return view('materiel', ['classes' => $classes]);
    }


    public function getCategoryItems(Request $request)
    {
        $category = $request->input('category');

    }

    public function create(Request $request)
    {
        return view('materiel', ['classes' => [], 'request' => $request]);
    }


    public function store(Request $request)
    {

        // Valider les données du formulaire
        $validatedData = $request->validate([
            'objectName' => 'required',
            'objectPosition' => 'required',
            'objectImage' => ['required', 'image'],
        ]);

        $asso = session('user')['current_asso']['login'];

        // Créer un nouvel objet dans la base de données
        $itemClass = ItemClass::create([

            'name' => $validatedData['objectName'],
            'description' => $validatedData['objectPosition'],
            'position' => $validatedData['objectPosition'],
            'private' => False,
            'quantity' => 0,
            'image' => $request->file('objectImage')->store('images', 'public'),
            'asso_id' => $asso
        ]);

        if ($request->has('objectCategory')) {
            $itemClass->categories()->attach($request->get('objectCategory'));
        }


        // Rediriger ou effectuer toute autre action après l'ajout
        return redirect()->back()->with('message', 'Objet ajouté avec succès');
    }

    public function updateObject(Request $request, $id)
    {
        $object = ItemClass::findOrFail($id);

        $validatedData = $request->validate([
            'objectName' => 'required',
            'objectPosition' => 'required',
            'objectImage' => ['image'],
        ]);

        // Update non-file fields
        $object->name = $validatedData['objectName'];
        $object->position = $validatedData['objectPosition'];

        if ($request->hasFile('objectImage')) {
//            Storage::disk('public')->delete($object->image);

            $imagePath = $request->file('objectImage')->store('your/path', 'public');
            $object->image = $imagePath;
        }

        $object->save();

        return redirect('/myAsso')->with('success', 'Object updated successfully');
    }


}
