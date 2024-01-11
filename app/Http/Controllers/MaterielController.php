<?php

namespace App\Http\Controllers;

use App\Enum\ConditionEnum;
use App\Models\Category;
use App\Models\ConditionHistory;
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


        $classes = $classes->paginate(10)->withQueryString();

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
    public function store(Request $request)
    {

        // Valider les données du formulaire
        $validatedData = $request->validate([
            'objectName' => 'required',
            'position' => 'required',
            'objectImage' => ['required', 'image'],
            'description' => 'required',
        ]);
        $asso = session('user')['current_asso']['login'];
        $position=$request->get('position');

        $private=$request->get('private');

        if($private)
            $private = true;
        else
            $private=false;

        $itemClass = new ItemClass([
            'name' => $validatedData['objectName'],
            'description' => $validatedData['description'],
            'position' => $position,
            'private' => $private,
            'quantity' => 0,
            'image' => $request->file('objectImage')->store('images', 'public'),
            'asso_id' => $asso
        ]);

        $itemClass->save();
        $category = $request->get('objectCategory');
        if ($category) {
            $itemClass->categories()->attach($category);

        }

        $nb_items = $request->get('nb_items');
        $conditions = ['Neuf','Tres bon','Bon','Moyen','Mauvais','Tres mauvais'];
/*        $conditions = [ConditionEnum::Neuf,ConditionEnum::TB,ConditionEnum::Bon, ConditionEnum::Moyen,ConditionEnum::Mauvais. ConditionEnum::TM];*/
        return view('addItems', ['nb_items'=>$nb_items, 'class'=>$itemClass, 'conditions' =>$conditions]);
    }

    public function addItems(Request $request){

        $items = $request->input('items');

        foreach ($items as $item) {
            $class_id = $item['class_id'];
            if (isset($item['monoItem'])) {
                $monoItem = true;
            }else
                $monoItem = false;
            $description = $item['description'];
            $quantity = $item['quantity'];

            $new_item = new Item([
                'mono_item'=>$monoItem,
                'quantity'=>$quantity,
                'description'=>$description]);
            $new_item->save();
            $class = ItemClass::find($class_id);
            $new_item['class_id']=$class_id;
            $new_item->save();
            $new_item->itemClass()->associate($class);

            $condition = $item['condition'];
            if($condition == 'Neuf')
                $condition = ConditionEnum::Neuf;
            elseif ($condition == 'Bon')
                $condition=ConditionEnum::Bon;
            elseif ($condition == 'Tres bon')
                $condition=ConditionEnum::TB;
            elseif ($condition == 'Moyen')
                $condition=ConditionEnum::Moyen;
            elseif ($condition == 'Mauvais')
                $condition=ConditionEnum::Mauvais;
            else
                $condition=ConditionEnum::TM;

            $new_cond = new ConditionHistory([
                'condition'=>$condition,
                'date' => now()->format('Y-m-d H:i:s'),
                'item_id'=> $new_item->id,
            ]);

            $cond = $new_cond->save();
            $new_cond->item()->associate($new_item);
            $new_cond = $new_cond->save();


        }
        return redirect('/myAsso');
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

    public function deleteObject($id)
    {
        try {
            $object = ItemClass::findOrFail($id);
            $object->delete();
            return redirect()->back()->with('success', 'Objet supprimé avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la suppression de l\'objet');
        }
    }

}
