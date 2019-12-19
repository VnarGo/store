<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Brand extends Model implements Searchable

{
    public $table = 'brands';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class);
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('brands.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }
}
