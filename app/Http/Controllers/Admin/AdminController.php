<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Orders;
use Illuminate\Http\Request;
use App\Products;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('admin.home');
    }

    public function products(){
        return view('admin.products',['products'=>Products::paginate(5)]);
    }

    public function product($id){
        return view('admin.product',['product'=>Products::find($id)]);
    }

    public function productEdit(Request $request){
        dd($request->get('id'));
        if ($request->has('id')){
            $product = Products::find($request->get('id'));
            $product->name=$request->get('id');
            $product->description=$request->get('description');
            $product->price=$request->get('price');
            $product->save();
            return redirect()->route('admin.productEdit',[$request->get('id')])
                ->with('status', 'Данные сохраненны!');
        } else
            return redirect()->route('admin.products');;

    }

    public function orders(){
        return view('admin.orders',['orders'=>Orders::paginate(5)]);
    }

    public function categories(){

    }

    public function users(){

    }

}
