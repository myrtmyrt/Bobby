<?php

namespace App\Http\Controllers;

use App\Models\ItemClass;
use Illuminate\Http\Request;

class AssoController extends Controller
{
    public function getAssoItems(Request $request)
    {
        $asso = session("user")["current_asso"]["login"];
        $class_id = ItemClass::where('asso_id', $asso)->with('items')->get();
        return view('myAsso', ['items' => $class_id]);
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

}
