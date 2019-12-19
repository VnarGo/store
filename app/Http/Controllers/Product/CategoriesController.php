<?php

namespace Store\Http\Controllers\Product;

use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Store\Brand;
use Store\Category;
use Store\Gender;
use Store\Http\Controllers\Controller;
use Store\Http\Requests\Search\BrandRequest;
use Store\Http\Requests\Search\GenderRequest;
use Store\Product;
use Store\Size;
use Store\Subcategory;

class CategoriesController extends Controller
{
    public function footwear(Request $request)
    {
        $query = Product::whereHas('subcategories', function ($q){
            $q->whereHas('categories' ,function ($q){
                $q->where('id',14);
            });
        });

        if (!empty($request->gender)) {

            $query->whereHas('genders', function ($q) use ($request) {
                $q->wherein('id', $request->gender);
            });
        }
        if (!empty($request->brand)){
            $query->whereHas('brand', function ($q)use ($request){
                $q->wherein('id',$request->brand);
            });
        }
        if (!empty($request->size)){
            $query->whereHas('sizes', function ($q) use ($request){
                $q->whereIn('id',$request->size);
            });
        }

        $products = $query->where('status',1)->get();

        $brands = Brand::all();

        $genders = Gender::all();

        $sizes = Size::whereBetween('size',['1','50'])->orderBy('size')->get();

        return view('products.index',compact('products','brands','genders','sizes'));
    }

    public function clothing(Request $request)
    {
        $query = Product::whereHas('subcategories', function ($q){
            $q->whereHas('categories' ,function ($q){
                $q->where('id',15);
            });
        });

        if (!empty($request->gender)) {

            $query->whereHas('genders', function ($q) use ($request) {
                $q->wherein('id', $request->gender);
            });
        }
        if (!empty($request->brand)){
            $query->whereHas('brand', function ($q)use ($request){
                $q->wherein('id',$request->brand);
            });
        }
        if (!empty($request->size)){
            $query->whereHas('sizes', function ($q) use ($request){
                $q->whereIn('id',$request->size);
            });
        }

        $products = $query->where('status',1)->get();

        $brands = Brand::all();

        $genders = Gender::all();

        $sizes = Size::whereBetween('size',['a','zzz'])->orderBy('size')->get();

        return view('products.index',compact('products','brands','genders','sizes'));
    }

    public function accessories(Request $request)
    {
        $query = Product::whereHas('subcategories', function ($q){
            $q->whereHas('categories' ,function ($q){
                $q->where('id',16);
            });
        });

        if (!empty($request->gender)) {

            $query->whereHas('genders', function ($q) use ($request) {
                $q->wherein('id', $request->gender);
            });
        }
        if (!empty($request->brand)){
            $query->whereHas('brand', function ($q)use ($request){
                $q->wherein('id',$request->brand);
            });
        }
        if (!empty($request->size)){
            $query->whereHas('sizes', function ($q) use ($request){
                $q->whereIn('id',$request->size);
            });
        }

        $products = $query->where('status',1)->get();

        $brands = Brand::all();

        $genders = Gender::all();

        $sizes = Size::whereBetween('size',['a','zzz'])->orderBy('size')->get();

        return view('products.index',compact('products','brands','genders','sizes'));
    }
}
