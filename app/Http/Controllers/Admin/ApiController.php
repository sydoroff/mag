<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function publish(Request $request, $name)
    {
        $cc = "App\\$name";
        $request->validate([
            'id' => 'required|integer',
        ]);
        $row = $cc::find($request->get('id'));
        if ($row == NULL) {
            abort(404);
        }
        $row->publish = !$row->publish;
        $row->save();

        return response()->json(['pos' => $row->publish],200);

    }

    public function getCategories()
    {
        return Categories::all()->toJson();
    }
    //====================================================================================//
}
