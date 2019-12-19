<?php

namespace Store\Http\Controllers\Product;

use Illuminate\Database\Eloquent\Builder;
use Store\Gender;
use Store\Http\Controllers\Controller;
use Store\Http\Requests\Search\BrandRequest;
use Store\Http\Requests\Search\GenderRequest;
use Store\Http\Requests\UpdateProductRequest;
use Store\Photo;
use Store\Size;
use Symfony\Component\HttpFoundation\Response;
use Store\Product;
use Store\Brand;
use Store\Subcategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Product::with('brand');

        if(!empty($request->search)) {
            $query = $query->where('title', 'like', "%$request->search%");
        }
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

        $products = $query->where('status',1)->latest()->get();

        $brands = Brand::all();

        $genders = Gender::all();

        $sizes = Size::orderBy('size')->get();

        return view('products.index',compact('products','brands','genders','sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Store\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        $subcategory = Subcategory::find($product->subcategories->first()->id)->categories;

        $brandPhotoPath = Brand::find($product->brand->first()->id)->photos->first()->path;

        $product->load('brand','photos','genders','subcategories','sizes');


        return view('products.show', compact('product','subcategory','brandPhotoPath'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Store\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Store\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Store\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function brands($id)
    {
        $products = Product::whereHas('brand',function ($query)use ($id){
            $query->where('brands.id',$id);
        })->where('status',1)->get();

        $genders = Gender::all();

        $brands = Brand::all();

        $sizes = Size::all();

        return view('products.index',compact('products','genders','brands','sizes'));
    }

}








