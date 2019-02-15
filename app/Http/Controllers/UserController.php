<?php

namespace App\Http\Controllers;
use App;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function usersIndex(){
//        $users = App\User::simplePaginate(3);
        $users = User::all();
        return view('admin.users', compact('users'));
    }
//      public function index(){
//          $users = App\User::all();
//          return view('pagination', compact('users'));
//    }
    public function usersEdit($id)
    {
        /** @var User $user */
        $user = User::find($id);
        return view('admin.edit', [
            'user' => $user
        ]);
    }
    public function usersSave(Request $request, $id)
    {
        $user = User::find($id);
        $name = $request->get('name');
        $user->name = $name;
        $email = $request->get('email');
        $user->email = $email;
        $phone = $request->get('phone');
        $user->phone = $phone;
        $user->save();
        return redirect(route('users.index'))->with('status', 'succesfully save!');
    }
    public function usersRemove($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
