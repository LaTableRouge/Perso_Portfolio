<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\Categorie;

class AdminController extends Controller
{

    public function admin()
    {
        $types = Type::All();
        return view('admin' , [
            'types' => $types,
        ]);
    }

    public function modifyType(Request $request) {

        $type = Type::findOrFail($request->input('id'));
        $type->libType = $request->input('value');

        $type->save();

        return 'modification ok';
    }

    public function addType(Request $request) {

        $type = new Type();
        $type->libType = $request->input('value');

        $type->save();

        return 'ajout ok';
    }

    public function deleteType(Request $request) {

        $type = Type::findOrFail($request->input('id'));
        $type->delete();

        return 'suppression ok';
    }

    public function modifyCategory(Request $request) {

        $category = Categorie::findOrFail($request->input('id'));
        $category->libCat = $request->input('value');

        $category->save();

        return 'modification ok';
    }

    public function addCategory(Request $request) {

        $category = new Categorie();
        $category->libCat = $request->input('value');
        $category->type_id = $request->input('idType');

        $category->save();

        return 'ajout ok';
    }

    public function deleteCategory(Request $request) {

        $category = Categorie::findOrFail($request->input('id'));
        $category->delete();

        return 'suppression ok';
    }
}

