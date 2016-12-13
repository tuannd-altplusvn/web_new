<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['slug', 'name'];

    const CATEGORY_PARRENT = 0;

    public function products()
    {
        return $this->hasMany(Product::class)
            ->orderBy('created_at', 'DESC');
    }

    public static function getCategories()
    {
        $categories = Category::where('parent_id', Category::CATEGORY_PARRENT)
                        ->orderBy('order', 'asc')
                        ->get();
        foreach ($categories as $key => $category) {
            $subCategories = Category::where('parent_id', $category->id)->get();
            if($subCategories)
            {
                $categories[$key]['sub_categories'] = $subCategories;
            }

        }

        return $categories;
    }

}
