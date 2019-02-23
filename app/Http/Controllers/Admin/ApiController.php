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
        if ($row->publish == 1) {
            $row->publish = 0;
        } else {
            $row->publish = 1;
        }
        $row->save();
        return json_encode(['pos' => $row->publish]);
    }

    public function getCategories()
    {
        return Categories::all()->toJson();
    }
    //====================================================================================//
}
