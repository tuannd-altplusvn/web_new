<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Image extends Model
{
    use EloquentTrait;

    protected $table = "images";
    protected $fillable = [
        "product_id", "image"
    ];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('image', config('customize-image.product-image'));

        parent::__construct($attributes);
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
