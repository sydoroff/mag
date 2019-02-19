<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Orders;
use Illuminate\Http\Request;
use App\Products;
use App\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(5);
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function showForm($id)
    {
        if ($id === 'create') return view('admin.users.form');
        $user = User::find($id);

        if ($user === null) {
            abort(404);
        }

        return view('admin.users.form', [
            'user' => $user
        ]);
    }


    public function remove(Request $request)
    {
        $user = User::find($request->get('id'));
        if ($user == null) {
            abort(404);
        }
        $user->delete();

        return redirect()->route('admin.users.index')->with('status', 'Пользователь удален!');
    }

    public function save(Request $request)
    {
        $user = new User();
        if ($request->get('id')) {
            $user = User::find($request->get('id'));
        }
        $fields = ['name', 'email', 'phone', 'role'];
        if ($request->get('pass1')) {
            $user->password = \Hash::make($request->get('pass1'));
        }
        $user->fill($request->only($fields));
        // dd($request->only($fields),$user);
        $user->save();

        return redirect()->route('admin.users.index')->with('status', 'Данные сохраненны!');
    }
}
