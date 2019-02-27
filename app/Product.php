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
        $image_path = Image::where('title', '=', 'mobile_preview')
            ->where('product_id', '=', $this->id)
            ->select('images.image_path')
            ->get();
        foreach ($image_path as $img){
            return 'http://laraveldev/layout/public/upload/products/' . $this->id . '/' . $img->image_path;
        }
    }
    public function getMobileAttribute()
    {
        $image_path = Image::where('title', '=', 'mobile')
            ->where('product_id', '=', $this->id)
            ->select('images.image_path')
            ->get();
        foreach ($image_path as $img){
            return 'http://laraveldev/layout/public/upload/products/' . $this->id . '/' . $img->image_path;
        }
    }
    public function getPreviewDecstopAttribute()
    {
        $image_path = Image::where('title', '=', 'decstop_preview')
            ->where('product_id', '=', $this->id)
            ->select('images.image_path')
            ->get();
        foreach ($image_path as $img){
            return 'http://laraveldev/layout/public/upload/products/' . $this->id . '/' . $img->image_path;
        }
    }
    public function getDecstopAttribute()
    {
        $image_path = Image::where('title', '=', 'decstop')
            ->where('product_id', '=', $this->id)
            ->select('images.image_path')
            ->get();
        foreach ($image_path as $img){
            return 'http://laraveldev/layout/public/upload/products/' . $this->id . '/' . $img->image_path;
        }
    }
    public function getFullAttribute()
    {
        $image_path = Image::where('title', '=', 'full')
            ->where('product_id', '=', $this->id)
            ->select('images.image_path')
            ->get();
        foreach ($image_path as $img){
            return 'http://laraveldev/layout/public/upload/products/' . $this->id . '/' . $img->image_path;
        }
    }
}
