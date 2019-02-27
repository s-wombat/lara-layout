<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'articul', 'brand', 'image_path', 'description', 'price', 'publish',
    ];

    function getImages(){
        return $this->hasMany('App\Image');
    }
    public function getPreviewMobileAttribute()
    {
//        $img = Image::where('product_id', '=', $product->id)->where('title', '=', 'mobile_preview')->get();
//        return $img->image_path;
//        return 'http://laraveldev/layout/public/upload/products/' . $this->id . '/mobile_preview.jpg';
//        return \DB::table('images')
        $image_path = Image::where('title', '=', 'mobile_preview')
//            ->join('products', 'images.product_id', '=', 'products.id')
            ->select('images.image_path')
            ->get();
        foreach ($image_path as $img_path){
            return $img_path;
//                return $this->id;

        }

//        return $image_path;
    }
}
