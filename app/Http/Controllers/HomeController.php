<?php

namespace Store\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use Store\Brand;
use Store\Photo;
use Store\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function search(Request $request)
    {
        $searchResults = (new Search( ))
            ->registerModel(Product::class,'title')
            ->registerModel(Brand::class,'name')
            ->perform($request->input('query'));


        //return $searhResults;
        return view('search',compact('searchResults'));
    }
}
