<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['slug', 'name'];

    public function posts()
    {
        return $this->hasMany(Post::class)
            ->where('status', '=', 'PUBLISHED')
            ->orderBy('created_at', 'DESC');
    }

    public function products()
    {
        return $this->hasMany(Product::class)
            ->orderBy('created_at', 'DESC');
    }
}
