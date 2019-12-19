<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable =[
        'gender'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
