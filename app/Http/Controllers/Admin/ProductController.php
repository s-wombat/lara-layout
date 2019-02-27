<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as ImageInt;;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.list', [
            'products' => $products
        ]);
    }
    public function showEditForm($id)
    {
        $product = Product::find($id);
        if ($product === null) {
            abort(404);
        }
        return view('admin.products.edit', [
           'product' => $product
        ]);
    }
    public function showCreateForm()
    {
        return view('admin.products.edit');
    }
    public function remove($id)
    {
        $product = Product::find($id);
        if ($product === null) {
            abort(404);
        }
        $product->delete();
        return redirect(route('admin.products.index'));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(Request $request, $id = null)
    {
        $product = new Product();
        if ($id) {
            $product = Product::find($id);
        }
        $fields = ['name', 'articul', 'brand', 'description', 'price', 'publish'];
        $product->fill($request->only($fields));
        $product->save();

//создание картинки
        $path = public_path() . '\upload\products\\' . $product->id . '//';
        $files = $request->file('file');
//dd($files);
        // если нет папки \upload\products\, то создать
        if(!file_exists($path)){
            mkdir($path, 777, true);
        }
        foreach ($files as $file) {
            $filename ='_' . str_random(10) . '.' . $file->getClientOriginalExtension();
            $img = ImageInt::make($file);
            $img->save($path . 'origin' . $filename);
            $img->resize(100, 100)->save($path . 'mobile_preview' . $filename);
            $img->resize(100, 200)->save($path . 'mobile' . $filename);
            $img->resize(200, 300)->save($path . 'decstop_preview' . $filename);
            $img->resize(300, 200)->save($path . 'decstop' . $filename);
            $img->resize(500, 500)->save($path . 'full' . $filename);
            Image::create(['title' => 'origin', 'image_path' => $path . 'origin' . $filename, 'product_id' => $product->id]);
            Image::create(['title' => 'mobile_preview', 'image_path' => $path . 'mobile_preview' . $filename, 'product_id' => $product->id]);
            Image::create(['title' => 'mobile', 'image_path' => $path . 'mobile' . $filename, 'product_id' => $product->id]);
            Image::create(['title' => 'decstop_preview', 'image_path' => $path . 'decstop_preview' . $filename, 'product_id' => $product->id]);
            Image::create(['title' => 'decstop', 'image_path' => $path . 'decstop' . $filename, 'product_id' => $product->id]);
            Image::create(['title' => 'full', 'image_path' => $path . 'full' . $filename, 'product_id' => $product->id]);
        }

//-------------------------------
dd(coutn($files));
            return redirect(route('admin.products.index'));
    }
}
