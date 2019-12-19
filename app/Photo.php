<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Photo extends Model
{
    public $table = 'photos';

    protected $fillable = [
        'path'
    ];

    public function products()
    {
        return $this->belongsToMany('Store\Product','product_photo','photo_id','product_id');
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class);
    }

}
