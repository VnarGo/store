<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
      'name',
      'status'
    ];

    public function subcategories()
    {
        return $this->belongsToMany('Store\Subcategory','subcategory_category','category_id','subcategory_id');
    }

}
