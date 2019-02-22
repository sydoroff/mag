<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Categories;
use Illuminate\Http\Request;
use App\Products;
use App\User;

class CategoriesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //  $pr=Products::with('getCategories')->get();
        //  dd($pr[0]->getCategories);
        return view('admin.categories.index', ['categories' => Categories::with('getProducts')->paginate(5)]);
    }


    public function showForm($id)
    {
        // dd($id);

        if ($id === 'create') return view('admin.categories.form');
        $categories = Categories::with('getProducts')->find($id);

        if ($categories === null) {
            abort(404);
        }

        return view('admin.categories.form', [
            'categories' => $categories
        ]);
    }


    public function remove(Request $request)
    {
        $categories = Categories::find($request->get('id'));
        if ($categories == null) {
            abort(404);
        }
        $categories->delete();

        return redirect()->route('admin.categories.index')->with('status', 'Категория удалена!');
    }

    public function save(Request $request)
    {
        $categories = new Categories();
        if ($request->get('id')) {
            $categories = Categories::find($request->get('id'));
        }
        $fields = ['name', 'description', 'up_cat'];

        $categories->fill($request->only($fields));
        $categories->save();

        return redirect()->route('admin.categories.index')->with('status', 'Данные сохраненны!');
    }

    //====================================================================================//
}
