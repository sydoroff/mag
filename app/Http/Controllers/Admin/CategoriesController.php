<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Orders;
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
        return view('admin.categories.index', ['products' => Products::with('getCategories')->paginate(5)]);
    }


    public function showForm($id)
    {
        // dd($id);

        if ($id === 'create') return view('admin.categories.form');
        $product = Products::with('getCategories')->find($id);

        if ($product === null) {
            abort(404);
        }

        return view('admin.categories.form', [
            'product' => $product
        ]);
    }


    public function remove(Request $request)
    {
        $product = Products::find($request->get('id'));
        if ($product == null) {
            abort(404);
        }
        $product->delete();

        return redirect()->route('admin.categories.index')->with('status', 'Категория удалена!');
    }

    public function save(Request $request)
    {
        $product = new Products();
        if ($request->get('id')) {
            $product = Products::find($request->get('id'));
        }
        $fields = ['name', 'articul', 'brand', 'description', 'price'];

        $product->fill($request->only($fields));
        $product->save();

        return redirect()->route('admin.categories.index')->with('status', 'Данные сохраненны!');
    }

    //====================================================================================//
}
