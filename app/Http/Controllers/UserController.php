<?php

namespace App\Http\Controllers;
use App;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
//        $users = App\User::simplePaginate(3);
        $users = User::all();
        return view('adminpanel.users', compact('users'));
    }
//      public function index(){
//          $users = App\User::all();
//          return view('pagination', compact('users'));
//    }
    public function remove($id)
    {
//        $user_del = DB::table('users')->where('id',$id)->delete();
        $user = User::find($id);
        $user->delete();
//        dd($id);
        return redirect()->route('index');
    }
}
