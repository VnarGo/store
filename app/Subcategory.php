<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'name'
    ];

    public function categories()
    {
        return $this->belongsToMany('Store\Category','subcategory_category','subcategory_id','category_id');
    }
}
