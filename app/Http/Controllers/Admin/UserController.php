<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('admin.users.list', [
            'users' => $users
        ]);
    }

    public function showEditForm(RoleController $roles, $id)
    {
        $user = User::find($id);
        if ($user === null) {
            abort(404);
        }
        $roles = $roles->getRole();
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function showCreateForm(RoleController $roles)
    {

        $roles = $roles->getRole();
        return view('admin.users.edit', [
            'roles' => $roles
        ]);
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
        $user = new User();
        if ($id) {
            $user = User::find($id);
        }
        $fields = ['name', 'email', 'phone', 'role_id'];

        if ($request->get('password')) {
            $user->password = Hash::make($request->get('password'));
        }
        $user->fill($request->only($fields));
        $user->save();

        return redirect(route('admin.users.index'));
    }

    public function sort(Request $request)
    {
        $users_sort = null;
        $name = $request->input('users_sort');
        if($name){
            $users_sort= User::orderBy($name)->paginate(10);
        }
        else{
            $users_sort= User::paginate(10);
        }
        return view('admin.users.list', [
            'users' => $users_sort
        ]);
    }
}
