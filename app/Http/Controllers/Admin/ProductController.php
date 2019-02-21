<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Orders;
use Illuminate\Http\Request;
use App\Products;
use App\User;

class ProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware("BreadCrumbs:Создание и редактирование товара,admin.products.edit,id=>create")->only('showForm');
    }

    public function index()
    {
        //  $pr=Products::with('getCategories')->get();
        //  dd($pr[0]->getCategories);
        return view('admin.products.index', ['products' => Products::with('getCategories')->paginate(5)]);
    }


    public function showForm($id)
    {
        // dd($id);

        if ($id === 'create') {

            return view('admin.products.form');
        }

        $product = Products::with('getCategories')->find($id);

        if ($product === null) {
            abort(404);
        }

        return view('admin.products.form', [
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

        return redirect()->route('admin.products.index')->with('status', 'Товар удален!');
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

        return redirect()->route('admin.products.index')->with('status', 'Данные сохраненны!');
    }

    public function active(Request $request)
    {
        if ($request->get('id')) {
            $product = Products::find($request->get('id'));
            if ($product->publish == 1)
                $product->publish = 0;
            else
                $product->publish = 1;
            $product->save();
            return json_encode(['pos' => $product->publish]);
        }
    }
    //====================================================================================//
}
