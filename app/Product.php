<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Product extends Model implements Searchable
{
    public $table = 'products';

    protected $fillable = [
        'status',
        'in_stock',
        'title',
        'price',
        'discount_price',
        'main_image'
    ];

    public function brand()
    {
        return $this->belongsToMany(Brand::class);
    }

    public function subcategories()
    {
        return $this->belongsToMany('Store\Subcategory','subcategory_product','product_id','subcategory_id');
    }

    public function photos()
    {
        return $this->belongsToMany('Store\Photo','product_photo','product_id','photo_id');
    }

    public function genders()
    {
        return $this->belongsToMany(Gender::class);
    }

    public function getSearchResult():SearchResult
    {
        $url = route('products.show',$this->id);

        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }
}
