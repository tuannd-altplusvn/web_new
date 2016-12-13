<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $table = "products";
    protected $fillable = [
        "category_id", "name", "price", "discount", "view", 
    ];

    public function order()
    {
        return $this->belongsTo('App\Model\Order', 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}