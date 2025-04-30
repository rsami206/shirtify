<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shirt extends Model
{


    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'discounted_price',
        'stock',
        'size',
        'color',
        'image_path',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
