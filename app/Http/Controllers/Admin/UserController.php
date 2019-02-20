<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.list', [
            'users' => $users
        ]);
    }

    public function showEditForm($id)
    {
        $user = User::find($id);
        if ($user === null) {
            abort(404);
        }
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }
    public function showCreateForm()
    {
        return view('admin.users.edit');
    }
    public function remove($id)
    {
        $user = User::find($id);
        if ($user == null) {
            abort(404);
        }
        $user->delete();

        return redirect(route('admin.users.index'));
    }
    public function save(UserRequest $request, $id = null)
    {
//        $request->validate([
//            'name' => 'required|max:255',
//            'email' => 'required|unique:users',
//            'password' => 'required|min:6',
//        ]);
        $user = new User();
        if ($id) {
            $user = User::find($id);
        }
        $fields = ['name', 'email', 'phone'];
        if ($request->get('password')) {
            $user->password = \Hash::make($request->get('password'));
        }
        $user->fill($request->only($fields));
        $user->save();

        return redirect(route('admin.users.index'));
}
}
