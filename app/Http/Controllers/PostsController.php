<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
        return view('posts.index');
    }
    public function categories(){
        return view('posts.categories');
    }
    public function cart(){
        return view('posts.cart');
    }
    public function checkout(){
        return view('posts.checkout');
    }
    public function contact(){
        return view('posts.contact');
    }
    public function product(){
        return view('posts.product');
    }
}
