<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Category extends Model
{
    protected $fillable = [
        'name', 'img'
    ];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Goods::class, 'category_id', 'id');
    }

    public function parentCategory()
    {
        return $this->belongsTo(GroupCategory::class, 'group_id', 'id');
    }


    static public function build() : void
    {
        $offset = 0;
        $max_products = 100;

        Goods::query()->chunk($max_products, function ($products) {
           foreach ($products as $product) {
               $category = self::where('name', $product->category_name)->first();
               if (!$category) {
                   $category = self::create([ 'name' =>  $product->category_name ]);
               }
               $product->addCategory($category->id);
           }
        });
    }
}
