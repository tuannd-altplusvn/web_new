<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = [
        "category_id", "name", "price", "discount", "view", 
    ];


    public static function getProductsOfCategory($category_id)
    {
        $products = Product::where('category_id', $category_id)->get();
        return $products;
    }

    public static function getRelatedProducts($category_id, $take)
    {
        $products = Product::where('category_id', $category_id)->take($take)->get();
        return $products;
    }

    public static function getArrivalProducts()
    {
        $products = Product::orderBy('created_at', 'DESC')->take(4)->get();
        return $products;
    }

    public static function getPopularProducts($limit, $offset)
    {
        $products = Product::orderBy('view', 'DESC')->offset($offset)->limit($limit)->get();
        return $products;
    }
}
